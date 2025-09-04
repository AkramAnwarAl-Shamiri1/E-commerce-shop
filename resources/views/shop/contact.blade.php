@extends('layouts.app')

@section('title', ' Contact')

@section('content')

    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Contact Us</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->

    <!-- Contact-Page -->
    <div class="page-contact u-s-p-t-80 u-s-p-b-80">
        <div class="container">
            <div class="row">
                <!-- Form -->
                <div class="col-lg-8 col-md-12 wow fadeInLeft">
                    <div class="contact-area u-h-100">
                        <h3 class="mb-4"> Get in Touch</h3>
                        <p class="u-s-m-b-30">Have questions or feedback? Fill the form below and our team will get back to you shortly.</p>

                        {{-- رسائل نجاح/فشل --}}
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="ion ion-md-person"></i></span>
                                        <input type="text" name="name" id="name" class="form-control" required maxlength="100" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="ion ion-md-mail"></i></span>
                                        <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="subject">Subject</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ion ion-md-chatboxes"></i></span>
                                    <input type="text" name="subject" id="subject" class="form-control" required maxlength="150" value="{{ old('subject') }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" rows="6" class="form-control" required>{{ old('message') }}</textarea>
                            </div>
                            <button class="btn btn-primary btn-lg" type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
                <!-- Form /- -->

                <!-- Contact Info -->
                <div class="col-lg-4 col-md-12 wow fadeInRight">
                    <div class="contact-info u-h-100 u-s-m-b-30">
                        <h4 class="mb-3">Contact Information</h4>
                        <p><i class="ion ion-md-pin"></i> Taiz'a, Yemen</p>
                        <p><i class="ion ion-md-call"></i> +967 777503020</p>
                        <p><i class="ion ion-md-mail"></i> info@example.com</p>
                        <div class="social-media-list u-s-m-t-20">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Contact Info /- -->
            </div>



<!-- app /- -->
<!--[if lte IE 9]>
<div class="app-issue">
    <div class="vertical-center">
        <div class="text-center">
            <h1>You are using an outdated browser.</h1>
            <span>This web app is not compatible with following browser. Please upgrade your browser to improve your security and experience.</span>
        </div>
    </div>
</div>
<style> #app {
    display: none;
} </style>
<![endif]-->
<!-- NoScript -->
<noscript>
    <div class="app-issue">
        <div class="vertical-center">
            <div class="text-center">
                <h1>JavaScript is disabled in your browser.</h1>
                <span>Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser to register for Groover.</span>
            </div>
        </div>
    </div>
    <style>
    #app {
        display: none;
    }
    </style>
</noscript>
<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
window.ga = function() {
    ga.q.push(arguments)
};
ga.q = [];
ga.l = +new Date;
ga('create', 'UA-XXXXX-Y', 'auto');
ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
<!-- Modernizr-JS -->
<script type="text/javascript" src="js/vendor/modernizr-custom.min.js"></script>
<!-- NProgress -->
<script type="text/javascript" src="js/nprogress.min.js"></script>
<!-- jQuery -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Popper -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- ScrollUp -->
<script type="text/javascript" src="js/jquery.scrollUp.min.js"></script>
<!-- Elevate Zoom -->
<script type="text/javascript" src="js/jquery.elevatezoom.min.js"></script>
<!-- jquery-ui-range-slider -->
<script type="text/javascript" src="js/jquery-ui.range-slider.min.js"></script>
<!-- jQuery Slim-Scroll -->
<script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
<!-- jQuery Resize-Select -->
<script type="text/javascript" src="js/jquery.resize-select.min.js"></script>
<!-- jQuery Custom Mega Menu -->
<script type="text/javascript" src="js/jquery.custom-megamenu.min.js"></script>
<!-- jQuery Countdown -->
<script type="text/javascript" src="js/jquery.custom-countdown.min.js"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<!-- Main -->
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>

@endsection
@section('scripts')
    {{-- سكربتات إضافية خاصة بهذه الصفحة عند الحاجة --}}
@endsection