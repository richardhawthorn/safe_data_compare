<?php

class CompareController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		return View::make('pages.compare.index');
	}

	public function postCreate(){

		$compare = new Compare;
		$compare->name = Input::get('name');
		$compare->unique = str_random(10);
		$compare->save();

		return Redirect::to('compare/view/'.$compare->unique);

	}

	public function postFind(){

		$unique = Input::get('unique');

		if (!$unique){
			$unique = 'null';
		}

		return Redirect::to('compare/view/'.$unique);

	}

	public function getNotfound(){
		return View::make('pages.compare.notfound');
	}

	public function getView($unique){

		$compare = Compare::where('unique', $unique)->first();

		if (!$compare){
			return Redirect::to('compare/notfound');
		}

		$owner_id = Session::get('owner');

		if (!$owner_id){
			$owner_id = str_random(10);
			Session::put('owner', $owner_id);
		}

		$total_uploads = Data::where('compare_id', $unique)->count();
		$owner_uploads = Data::where('owner_id', $owner_id)->where('compare_id', $unique)->count();
		$other_uploads = Data::where('owner_id', '!=', $owner_id)->where('compare_id', $unique)->count();
		//$total_uploaders = DB::select('select count(distinct owner_id) as count from data where compare_id = "'.$unique.'" ');
		//$total_uploaders = $total_uploaders[0]->count;

		$uploaders = DB::select('select distinct owner_id as owner_id from data where compare_id = "'.$unique.'" ');
		$total_uploaders = count($uploaders);

		$matches = 'n/a';

		if ($total_uploaders == 2){
			$compare_data = DB::select("
				select count(distinct data1.id) as count from 
				data as data1
				inner join
				data as data2
				on data1.hash = data2.hash
				where data1.compare_id = '".$unique."'
				and data1.owner_id = '".$uploaders[0]->owner_id."'
				and data2.owner_id = '".$uploaders[1]->owner_id."'
			");

			$matches = $compare_data[0]->count;
		}

		$data = array(
			'compare' => $compare,
			'owner_uploads' => $owner_uploads,
			'total_uploads' => $total_uploads,
			'other_uploads' => $other_uploads,
			'total_uploaders' => $total_uploaders,
			'matches' => $matches,
		);

		return View::make('pages.compare.view', $data);

	}

	public function postUpload($unique){

		$compare = Compare::where('unique', $unique)->first();

		if ((!$compare) || (!Session::get('owner'))){
			return Redirect::to('compare/notfound');
		}

		$file = Input::file('csv');

		$data_set = array();
		$config = new LexerConfig();
		$config->setDelimiter("\t");
		$lexer = new Lexer($config);

		//setup the interpreter
		$interpreter = new Interpreter();
		$interpreter->unstrict();
		$interpreter->addObserver(function(array $row) use (&$data_set) {

			$data_set[] = $row[0];

		});

		//parse it!
		$lexer->parse($file, $interpreter);

		//loop through the data
		foreach ($data_set as $data_item){

			$data = new Data;
			$data->compare_id = $unique;
			$data->owner_id = Session::get('owner');
			$data->hash = md5($data_item);
			$data->save();
	
		}

		return Redirect::back();

	}

}
