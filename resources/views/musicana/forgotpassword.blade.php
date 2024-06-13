
    <!-- ##### Breadcumb Area End ##### -->
    @extends('musicana.layout')
     @section('content')
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
    @endsection
 
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