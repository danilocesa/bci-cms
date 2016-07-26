<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | BCI. eNav</title>
    <link rel="icon" type="image/png" href="{{ asset('image/favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('image/favicon-16x16.png')}}" sizes="16x16" />
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('css/nprogress.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">


     <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
     <!-- Parsley -->
    <script src="js/parsley.min.js"></script>
    <!-- Parsley -->
    <script>
      $(document).ready(function() {
        window.Parsley.on('field:validate', function() {
          validateFront();
        });
        $('#admin-login .btn').on('click', function() {
          $('#admin-login').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#admin-login').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
      try {
        hljs.initHighlightingOnLoad();
      } catch (err) {}
    </script>
    <!-- /Parsley -->
  </head>

  <body class="login">

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form data-parsley-validate id="admin-login" name="adminLogin" action="" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <h1>Login Form</h1>
              @if (session('checkUser'))
              <div class="alert alert-danger">
                {{ session('checkUser') }}
              </div>
              @endif
              <div>
                <input type="text" name="email" class="form-control" placeholder="Email" required="required" data-parsley-required-message="Please enter your email" value="{{ old('email') }}" />
                @if(count($errors->get('email')) > 0)
                <div class="alert alert-danger">
                    {{ $errors->get('email')[0] }}
                </div>
                @endif 
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" data-parsley-required-message="Please enter your password"  required="required"/>
                @if(count($errors->get('password')) > 0)
                <div class="alert alert-danger">
                  {{ $errors->get('password')[0] }}
                </div>
                @endif 
              </div>
              <div>
                <button type="submit" class="btn btn-success submit">Log in</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>
              <div class="separator">
                <div class="clearfix"></div>
                <div>
                  <h1><img src="{{ asset('images/bci-logo.png') }}" alt="BCI Logo" width="200" /></h1>
                  <p>©2016 All Rights Reserved. BCI.eNav</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>