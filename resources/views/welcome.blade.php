

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Carlton Academy</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <link rel="stylesheet" href="{{ URL::asset('main_resource/animate.css/animate.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('main_resource/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('main_resource/simple-line-icons/css/simple-line-icons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('main_resource/jquery/bootstrap/dist/css/bootstrap.css') }}" type="text/css" />

  <link rel="stylesheet" href="{{ URL::asset('main_resource/css/font.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('main_resource/css/app.css') }}" type="text/css" />

  <link rel="shortcut icon" href="{{ URL::asset('main_resource/images/logo.ico') }}">

</head>
<body>

  <!-- header -->
  <header id="header" class="navbar navbar-fixed-top bg-white-only padder-v"  data-spy="affix" data-offset-top="1">
    <div class="container">
      <div class="navbar-header">
        <button class="btn btn-link visible-xs pull-right m-r" type="button" data-toggle="collapse" data-target=".navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
        <a href="#" class="navbar-brand m-r-lg"><span class="h3 font-bold">
        <img src="{{ URL::asset('main_resource/images/logo.ico') }}" />
        Carlton</span></a>
      </div>
      <div class="collapse navbar-collapse">
      <!--
        <ul class="nav navbar-nav font-bold">
          <li>
            <a href="#what" data-ride="scroll">What is Angulr</a>
          </li>
          <li>
            <a href="#why" data-ride="scroll">Why</a>
          </li>
          <li>
            <a href="#features" data-ride="scroll">Features</a>
          </li>
          <li>
            <a href="http://themeforest.net/item/angulr-bootstrap-admin-web-app-with-angularjs/8437259">Download</a>
          </li>
        </ul>
        -->
        <ul class="nav navbar-nav navbar-right">
          <li>
            <div class="m-t-sm">
              <a href="#why" data-ride="scroll" class="btn btn-link btn-md">How it works</a>
              <a href="#" class="btn btn-link btn-md">Showcase</a>
              <a href="#" class="btn btn-link btn-md">Pricing</a> |
              @if (Auth::guest())
              <a href="{{ url('/login') }}" class="btn btn-link btn-md">Log in</a>
              <a href="{{ url('/register') }}" class="btn btn-link b-success"><strong>Get started</strong></a>
              @else
              <a href="{{ url('/admin/project') }}" class="btn btn-link b-success">Continue</a>
              @endif
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <!-- / header -->
  <div id="content">

    <div class="bg-white-only" style="background-image: url(main_resource/images/background.jpg); background-repeat:no-repeat;background-size:cover;">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
            <div class="m-t-xxl m-b-xxl padder-v" style="margin-bottom: 0px;">
              <h1 class="font-bold l-h-1x m-t-xxl text-black padder-v animated fadeInDown">
                Build a professional online portfolio.<br>
                The perfect tool for photographers, artists,<br>
                designers and those who like to create.
                <br><span class="b-b b-black b-3x"></span>
              </h1>

            </div>
            <p class="text-center m-b-xxl wrapper">
              <a href="#" target="_blank" class="btn b-2x btn-lg b-white btn-defult btn-rounded text-lg font-bold m-b-xxl animated fadeInUpBig">Play Video</a>
              <a href="#" target="_blank" class="btn b-2x btn-lg b-success btn-success btn-rectangle text-lg font-bold m-b-xxl animated fadeInUpBig">Get Started</a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div id="why" class="bg-light">
      <div class="container">
        <div class="m-t-xxl m-b-xl text-center wrapper">
          <h2 class="text-black font-bold">Choose your template</h2>
          <p class="text-muted h4 m-b-xl">Choose from a growing collection of professionally designed templates.<br>
              Our pixel-perfect templates are customizable, easy-to-use and focus solely on your content.</p>
        </div>


        <div class="m-t-xxl m-b-xl">
          <div class="carousel auto slide clearfix bg-light" id="b-slide" data-interval="6000">
          <div class="carousel-inner text-center m-t-xl m-b-xl bg-light">
            <div class="item">
              <div class="row">
                <div class="col-sm-8 col-sm-offset-2 m-b-xl">
                  <img class="thumbnail" src="{{ URL::asset('main_resource/temp_images/mason-template.jpg') }}">
                </div>
              </div>
            </div>
            <div class="item active">
              <div class="row">
                <div class="col-sm-8 col-sm-offset-2  m-b-xl">
                  <img src="{{ URL::asset('main_resource/temp_images/mason-template.jpg') }}">
                </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-sm-8 col-sm-offset-2  m-b-xl">
                  <img src="{{ URL::asset('main_resource/temp_images/mason-template.jpg') }}">
                </div>
              </div>
            </div>
          </div>
          <a class="left carousel-control bg-light" href="#b-slide" data-slide="prev" style="opacity: .0;">
            <span class="glyphicon glyphicon-chevron-left text-black" aria-hidden="true" style="opacity:.5;"></span>
          </a>
          <a class="right carousel-control bg-light" href="#b-slide" data-slide="next" style="opacity: .0;">
            <span class="glyphicon glyphicon-chevron-right text-black" aria-hidden="true" style="opacity:.5;"></span>
          </a>
        </div>


        <div class="row m-t-xl m-b-xl text-center">
          <div class="col-sm-6">
          <div class="col-sm-6"></div>
          <div class="col-sm-6" data-ride="animated" data-animation="fadeInLeft" data-delay="300">
            <div class="m-b-xl">
              <h4 class="m-t-none">Optimised for mobile</h4>
              <p class="text-muted m-t-lg">Each template is fully responsive and will adapt itself to any mobile or tablet device. iPad, iPhone, Android, Windows — all covered.</p>
            </div>
              <i class="fa fa-lg w-3x fa-apple"></i>
              <i class="fa fa-lg w-3x fa-android"></i>
              <i class="fa fa-lg w-3x fa-windows"></i>
          </div>
          </div>
          <div class="col-sm-6">
          <div class="col-sm-6" data-ride="animated" data-animation="fadeInLeft" data-delay="600">
            <div class="m-b-xl">
              <h4 class="m-t-none">Retina (and HiDPI) ready</h4>
              <p class="text-muted m-t-lg">Your portfolio will look vibrant, detailed and sharp when viewed with any Retina (or HiDPI) display or device. Dunked will automatically detect hi-resolution screens and ensure your work continues to look stunning.</p>
            </div>
          </div>
          <div class="col-sm-6"></div>
          </div>
        </div>
      </div>
    </div>

   <div id="second" class="bg-white">
      <div class="container">
        <div class="m-t-xxl m-b-xl text-center wrapper">
          <h2 class="text-black font-bold">Add your content</h2>
          <p class="text-muted h4 m-b-xl">Upload images from your computer, or embed content from your social networks.<br>
            When you're done uploading, manage your content through a simple-to-use drag and drop interface.</p>
        </div>


        <div class="m-t-xxl m-b-xl">
            <div class="col-sm-2 col-sm-offset-5 m-b-xl">
              <img class="tumbnail" src="{{ URL::asset('main_resource/temp_images/bricks-template-mobile.jpg') }}">
            </div>
        </div>
      </div>
    </div>


    <div id="third" class="bg-light">
      <div class="container">
        <div class="m-t-xxl m-b-xl text-center wrapper">
          <h2 class="text-black font-bold">Customize your website.</h2>
          <p class="text-muted h4 m-b-xl">Make your portfolio your own by customizing your chosen template.<br>
Adjust layout, colors and fonts through our simple customizer, or edit HTML and CSS directly.</p>
        </div>


        <div class="m-t-xxl m-b-xl">
            <div class="col-sm-8 col-sm-offset-2 m-b-xl">
              <img class="tumbnail" src="{{ URL::asset('main_resource/temp_images/bricks-template.jpg') }}">
            </div>
        </div>

        <div class="row m-t-xl m-b-xl text-center">
          <div class="col-sm-6">
          <div class="col-sm-6"></div>
          <div class="col-sm-6" data-ride="animated" data-animation="fadeInLeft" data-delay="300">
            <div class="m-b-xl">
              <h4 class="m-t-none">Simple editing</h4>
              <p class="text-muted m-t-lg">Adjust layout, colors and typography using a selection of preset options. Make drastic changes without touching a line of code.</p>
            </div>
          </div>
          </div>
          <div class="col-sm-6">
          <div class="col-sm-6" data-ride="animated" data-animation="fadeInLeft" data-delay="600">
            <div class="m-b-xl">
              <h4 class="m-t-none">HTML & CSS editing</h4>
              <p class="text-muted m-t-lg">Take complete control of your portfolio's HTML and stylesheet to make it your own. Perfect for all you code wranglers.</p>
            </div>
          </div>
          <div class="col-sm-6"></div>
          </div>
        </div>

      </div>
    </div>


    <div id="forth" class="bg-black">
      <div class="container">
        <div class="m-t-xxl m-b-xl text-center wrapper">
          <h2 class="text-white font-bold">That's it. You are done.</h2>
          <p class="text-muted h4 m-b-xl">Yes, it really is that easy. Sit back, relax and admire your handiwork.<br>
Share your new portfolio with friends, colleagues, potential employers and clients.</p>
        </div>


        <div class="m-t-xxl m-b-xl">
            <div class="col-sm-2 col-sm-offset-5 m-b-xl">
              <a href="#" target="_blank" class="btn b-2x btn-lg b-success btn-success btn-rectangle text-lg font-bold m-b-xxl">Get Started</a>
            </div>
        </div>
      </div>
    </div>


  </div>
  <!-- footer -->
  <footer id="footer" style="height: 100px;">
    <div class="bg-info">
      <div class="container">
        <div class="row m-t-xl m-b-xl">
          <div class="col-sm-6 text-white text-center">
            <h4 class="m-b">Are you ready to enjoy?</h4>
          </div>
          <div class="col-sm-6 text-center">
            <a href="http://themeforest.net/item/angulr-bootstrap-admin-web-app-with-angularjs/8437259?ref=flatfull" class="btn btn-lg btn-default btn-rounded">Get Angulr Now</a>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-light dk">
      <div class="container">
        <div class="row padder-v m-t">
          <div class="col-xs-8">
            <ul class="list-inline">
              <li><a href="#">Sales</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">API</a></li>
              <li><a href="#">Contact us</a></li>
              <li><a href="#">Job</a></li>
            </ul>
          </div>
          <div class="col-xs-4 text-right">
            Angulr &copy; 2015
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <script src="{{ URL::asset('main_resource/jquery/jquery/dist/jquery.js') }}"></script>
  <script src="{{ URL::asset('main_resource/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
  <script src="{{ URL::asset('main_resource/jquery/jquery_appear/jquery.appear.js') }}"></script>
  <script src="{{ URL::asset('main_resource/js/landing.js') }}"></script>
</body>
</html>
