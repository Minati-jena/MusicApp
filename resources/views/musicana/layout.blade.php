<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>One Music</title>

    <!-- Favicon -->
    <link rel="icon" href="{{url('/')}}/themes/img/core-img/favicon.ico">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{url('/')}}/themes/style.css">
    
    <!-- jQuery and jQuery Easing Plugin -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://kit.fontawesome.com/598de9b296.js" crossorigin="anonymous"></script>
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

    @include('musicana.header')
    <!-- Hero Area -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(https://media.istockphoto.com/id/685111998/photo/young-girl-dancing-to-the-music.jpg?s=2048x2048&w=is&k=20&c=OaiqAMqzs5F4x1Yv6vSOAuxf4CSve93VImqfd_vce5I=);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">SARGAM</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Beyond Time <span>Beyond Time</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img"  style="background-image: url(https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bXVzaWN8ZW58MHx8MHx8fDA%3D);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms"></h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Feel The Music <span>Feel The Music</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
   
    @include('musicana.contact')
    @include('musicana.footer')

    <!-- Popper js -->
    <script src="{{url('/')}}/themes/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{url('/')}}/themes/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="{{url('/')}}/themes/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="{{url('/')}}/themes/js/active.js"></script>
</body>

</html>
