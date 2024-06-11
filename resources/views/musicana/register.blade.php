<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>SignUP</title>

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
      @include('musicana.header') 
    <!-- ##### Login Area End ##### -->

<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
       
            <p>See what’s new</p>
            <h2>Register</h2>
        </div>
    </section>
   
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
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter your Name">
                                    
                                </div>  
                                <div class="form-group">
                                    <label for="user_id">User_Id</label>
                                    <input type="text" class="form-control" id="user_id" name="user_id" aria-describedby="emailHelp" placeholder="Enter user_id">
                                   
                                </div> 
                                <div class="form-group"> 
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter E-mail">
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small>
                                </div>
                                 
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn oneMusic-btn mt-30">Register</button>
                                 <a href="{{url('/')}}/login">login</a>
                            </form>
                    

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   @include('musicana.footer')
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