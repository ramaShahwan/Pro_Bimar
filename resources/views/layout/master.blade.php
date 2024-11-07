<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fables">
    <meta name="author" content="Enterprise Development">
    <link rel="shortcut icon" href="{{asset('assetss/custom/images/shortcut.png')}}">
    <!-- "{{asset('css/responsive.css')}}" -->
    <title> BIMAR </title>
    <style>

        @font-face {
    font-family: 'myfont';
    src: url('../assetss/خط نصرت.TTF') format('truetype'); /* استخدم 'truetype' بدلاً من '.TTF' */
}

* {
    font-family: 'myfont', sans-serif; /* إضافة خط بديل */
}
        .containerr {
            width: 100%;
            height: 100vh;
            background-color: rgba(0,0,0,0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .content {
            text-align: center;
            z-index: 2;
        }
        .content h1 {
            font-size: 95px;
            color: #fff;
            margin-bottom: 50px;
        }
        .content a {
            font-size: 23px;
            color: #fff;
            text-decoration: none;
            border: 2px solid #fff;
            padding: 15px 25px;
            border-radius: 50px;
            transition: 0.3s;
        }
        .content a:hover {
            background-color: #fff;
            color: #000;
        }
        .video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none; /* إخفاء الفيديوهات في البداية */
        }
        .video-container video.active {
            display: block; /* عرض الفيديو النشط */
        }
        .toggle-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 30px;
            color: rgba(255, 255, 255, 0.8);
            /* background-color: rgba(0, 0, 0, 0.2);  */
            background-color: rgba(0, 0, 0, 0.514);
            /* خلفية شفافة */
            border: none;
            padding: 10px;
            cursor: pointer;
            /* border-radius: 50%; */
            transition: 0.3s;
            z-index: 3;
            height: 100%;
            width: 100px;
        }
        .toggle-button:hover {
            background-color: rgba(255, 255, 255, 0.4);
            color: #000;
        }
        .toggle-button.left {
            /* left: 10px;  */
            /* زر السهم الأيسر */
            left: 0px;
        }
        .toggle-button.right {
            /* right: 10px; */
             /* زر السهم الأيمن */
             right: 0px;
        }
    </style>

    <!-- animate.css-->
    <link href="{{asset('assetss/vendor/animate.css-master/animate.min.css')}}" rel="stylesheet">
    <!-- Load Screen -->
    <link href="{{asset('assetss/vendor/loadscreen/css/spinkit.css')}}" rel="stylesheet">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- Font Awesome 5 -->
    <link href="{{asset('assetss/vendor/fontawesome/css/fontawesome-all.min.css')}}" rel="stylesheet">
    <!-- Fables Icons -->
    <link href="{{asset('assetss/custom/css/fables-icons.css')}}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{asset('assetss/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assetss/vendor/bootstrap/css/bootstrap-4-navbar.css')}}" rel="stylesheet">
    <!-- portfolio filter gallery -->
    <link href="{{asset('assetss/vendor/portfolio-filter-gallery/portfolio-filter-gallery.css')}}" rel="stylesheet">
    <!-- Video Background -->
    <link href="{{asset('assetss/vendor/video-background/video-background.css')}}" rel="stylesheet">
    <!-- FANCY BOX -->
    <link rel="stylesheet" href="{{asset('assetss/vendor/timeline/timeline.css')}}">
    <link rel="stylesheet" href="{{asset('assetss/vendor/timeline/timelify.css')}}">
    <link href="{{asset('assetss/vendor/fancybox-master/jquery.fancybox.min.css')}}" rel="stylesheet">
    <!-- RANGE SLIDER -->
    <link href="{{asset('assetss/vendor/range-slider/range-slider.css')}}" rel="stylesheet">
    <!-- OWL CAROUSEL  -->
    <link href="{{asset('assetss/vendor/owlcarousel/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assetss/vendor/owlcarousel/owl.theme.default.min.css')}}" rel="stylesheet">
    <!-- FABLES CUSTOM CSS FILE -->
    <link href="{{asset('assetss/custom/css/custom.css')}}" rel="stylesheet">
    <!-- FABLES CUSTOM CSS RESPONSIVE FILE -->
    <link href="{{asset('assetss/custom/css/custom-responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">





    <!-- TIMELINE-->

    <!-- OWL CAROUSEL  -->



    <!-- FABLES CUSTOM CSS FILE -->
    <!-- FABLES CUSTOM CSS RESPONSIVE FILE -->

    </head>


<body>
@include('layout.header')

    @yield('content')

    @include('layout.footer')

<script src="{{asset('assetss/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assetss/vendor/timeline/jquery.timelify.js')}}"></script>


<script src="{{asset('assetss/vendor/loadscreen/js/ju-loading-screen.js')}}"></script>
<script src="{{asset('assetss/vendor/jquery-circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('assetss/vendor/popper/popper.min.js')}}"></script>
<script src="{{asset('assetss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assetss/vendor/bootstrap/js/bootstrap-4-navbar.js')}}"></script>
<script src="{{asset('assetss/vendor/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assetss/vendor/fancybox-master/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('assetss/vendor/video-background/jquery.mb.YTPlayer.js')}}"></script>
<script src="{{asset('assetss/vendor/WOW-master/dist/wow.min.js')}}"></script>
<script src="{{asset('assetss/vendor/timeline/timeline.js')}}"></script>
<script src="{{asset('assetss/vendor/timeline/modernizr.js')}}"></script>
<script src="{{asset('assetss/custom/js/custom.js')}}"></script>


<script>
     $(".player").mb_YTPlayer();

</script>
<script>
    let currentVideo = 1;

    function toggleVideo(direction) {
        const video1 = document.getElementById('video1');
        const video2 = document.getElementById('video2');
        const video3 = document.getElementById('video3');

        // إخفاء جميع العناصر وإعادة تعيين فئة "النشط"
        video1.classList.remove('active');
        video2.classList.remove('active');
        video3.classList.remove('active');

        // إيقاف تشغيل الفيديوهات
        video1.pause();
        video2.pause();

        // التبديل للأمام أو للخلف حسب الاتجاه
        if (direction === 'next') {
            currentVideo = currentVideo === 3 ? 1 : currentVideo + 1;
        } else {
            currentVideo = currentVideo === 1 ? 3 : currentVideo - 1;
        }

        // تفعيل العنصر الحالي وإعادة تشغيل الفيديو إذا كان فيديو
        if (currentVideo === 1) {
            video1.classList.add('active');
            video1.play();  // تشغيل الفيديو
        } else if (currentVideo === 2) {
            video2.classList.add('active');
            video2.play();  // تشغيل الفيديو
        } else {
            video3.classList.add('active');
        }
    }
</script>

</body>
</html>
