
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Safe Data Compare</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/narrow.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <style>
      .title a:link {color: #777; text-decoration: none}
      .title a:active {color: #777; text-decoration: none}
      .title a:visited {color: #777; text-decoration: none}
      .title a:hover {color: #222; text-decoration: none}
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" @if (Request::is('/')) class="active" @endif>{{ link_to('/', 'Home') }}</li>
            <li role="presentation" @if (Request::is('compare/*') || Request::is('compare')) class="active" @endif>{{ link_to('compare', 'Compare') }}</li>
            <li role="presentation" @if (Request::is('about')) class="active" @endif>{{ link_to('about', 'About') }}</li>
          </ul>
        </nav>
        <h3 class="text-muted title" style="">{{ link_to('/', 'Safe Data Compare') }}</h3>
      </div>

      @yield('body')

      <br/>

      <footer class="footer">
        <p>&copy; Richard Hawthorn {{ date("Y") }}</p>
      </footer>

    </div> <!-- /container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  </body>
</html>
