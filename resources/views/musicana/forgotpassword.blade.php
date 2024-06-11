<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>One Music - Modern Music HTML5 Template</title>

    <!-- Favicon -->
    <link rel="icon" href="{{url('/')}}/Themes/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{url('/')}}/Themes/style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    
    <!-- ##### Login Area End ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(public/themes/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
       
            <p>See what’s new</p>
            <h2>Reset Password</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    @include('musicana.header')
    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Welcome Back</h3>
                        <!-- Login Form -->
                        <div class="login-form"> 
                              @if(isset($message))
                                <center>{!! $message !!}</center>
                               @endif
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter E-mail">
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small>
                                </div>
                                

                                <button type="submit" class="btn oneMusic-btn mt-30">Reset Password</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('musicana.footer')
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{url('/')}}/Themes/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{url('/')}}/Themes/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{url('/')}}/Themes/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="{{url('/')}}/Themes/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="{{url('/')}}/Themes/js/active.js"></script>
</body>

</html>