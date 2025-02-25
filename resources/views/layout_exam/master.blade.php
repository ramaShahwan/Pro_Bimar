<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BIMAR</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="{{asset('assetses/css/bootstrap.css')}}" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{asset('assetses/css/font-awesome.css')}}" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="{{asset('assetses/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{asset('assetses/css/custom.css')}}" rel="stylesheet" />
     <!-- GOOGLE FONTS-->

   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>

<div id="wrapper">

@include('layout_exam.header')
    @yield('content')

    @include('layout_exam.footer')
</div>

<script src="{{asset('assetses/js/jquery-1.10.2.js')}}"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset('assetses/js/bootstrap.min.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset('assetses/js/jquery.metisMenu.js')}}"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="{{asset('assetses/js/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('assetses/js/morris/morris.js')}}"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="{{asset('assetses/js/custom.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script>
    $(document).ready(function () {
        // استعادة حالة الأسئلة المحفوظة في localStorage
        let savedQuestions = JSON.parse(localStorage.getItem("validatedQuestions")) || [];

        // تغيير أيقونات الأسئلة التي تم حفظها
        savedQuestions.forEach(function (questionId) {
            let questionLink = $("a[href$='trainee/show/" + questionId + "']");
            let icon = questionLink.find("i");
            if (icon.length) {
                icon.removeClass("fa-regular fa-lightbulb").addClass("fa-solid fa-lightbulb");
            }
        });

        // عند الضغط على زر Validate
        $(".bttn").click(function (event) {
            event.preventDefault(); // منع إعادة تحميل الصفحة

            // استخراج معرف السؤال الحالي من رابط الصفحة
            let urlParts = window.location.pathname.split('/');
            let questionId = urlParts[urlParts.length - 1];

            // البحث عن رابط السؤال في القائمة العلوية (header)
            let questionLink = $("a[href$='trainee/show/" + questionId + "']");
            let icon = questionLink.find("i");

            if (icon.length) {
                // تغيير الأيقونة إلى ممتلئة
                icon.removeClass("fa-regular fa-lightbulb").addClass("fa-solid fa-lightbulb");

                // حفظ معرف السؤال في localStorage
                if (!savedQuestions.includes(questionId)) {
                    savedQuestions.push(questionId);
                    localStorage.setItem("validatedQuestions", JSON.stringify(savedQuestions));
                }
            }
        });
    });
</script> -->
<script>
    $(document).ready(function () {
        // استعادة حالة الأسئلة المحفوظة من localStorage
        let savedQuestions = JSON.parse(localStorage.getItem("validatedQuestions")) || [];

        // تغيير أيقونات الأسئلة التي تم حفظها
        savedQuestions.forEach(function (questionId) {
            let questionLink = $("a[href$='trainee/show/" + questionId + "']");
            let icon = questionLink.find("i");
            if (icon.length) {
                icon.removeClass("fa-regular fa-lightbulb").addClass("fa-solid fa-lightbulb");
            }
        });

        // عند الضغط على زر Validate
        $(".bttn").click(function (event) {
            event.preventDefault(); // منع إعادة تحميل الصفحة

            // استخراج معرف السؤال الحالي من رابط الصفحة
            let urlParts = window.location.pathname.split('/');
            let questionId = urlParts[urlParts.length - 1];

            // البحث عن رابط السؤال في القائمة العلوية (header)
            let questionLink = $("a[href$='trainee/show/" + questionId + "']");
            let icon = questionLink.find("i");

            if (icon.length) {
                // تغيير الأيقونة إلى ممتلئة
                icon.removeClass("fa-regular fa-lightbulb").addClass("fa-solid fa-lightbulb");

                // حفظ معرف السؤال في localStorage
                if (!savedQuestions.includes(questionId)) {
                    savedQuestions.push(questionId);
                    localStorage.setItem("validatedQuestions", JSON.stringify(savedQuestions));
                }
            }
        });

        // عند الضغط على زر "delete answers"
        $("#validate-btnn").click(function (event) {
            event.preventDefault(); // منع إعادة تحميل الصفحة

            // استخراج معرف السؤال الحالي من رابط الصفحة
            let urlParts = window.location.pathname.split('/');
            let questionId = urlParts[urlParts.length - 1];

            // البحث عن رابط السؤال في القائمة العلوية
            let questionLink = $("a[href$='trainee/show/" + questionId + "']");
            let icon = questionLink.find("i");

            if (icon.length) {
                // تغيير الأيقونة إلى فارغة
                icon.removeClass("fa-solid fa-lightbulb").addClass("fa-regular fa-lightbulb");

                // إزالة معرف السؤال من localStorage
                savedQuestions = savedQuestions.filter(id => id !== questionId);
                localStorage.setItem("validatedQuestions", JSON.stringify(savedQuestions));
            }
        });
    });
</script>



</body>
</html>
