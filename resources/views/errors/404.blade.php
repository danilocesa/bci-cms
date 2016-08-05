
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | BCI.eNav</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('css/nprogress.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">404</h1>
              <h2>Sorry but we couldn't find this page</h2>
              <p>This page you are looking for does not exist <a href="{{ url('web-admin') }}">Go Back</a>
              </p>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/fastclick.min.js') }} "></script>
    <!-- NProgress -->
    <script src="{{ asset('js/nprogress.min.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
  </body>
</html>
