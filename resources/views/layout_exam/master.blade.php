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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >

</head>
<body style="    overflow: auto;
    margin: 0;
    padding: 0;">

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
    <script>
    window.onload = function () {
        if (window.history && window.history.pushState) {
            window.history.pushState("no-back", null, null);
            window.onpopstate = function () {
                window.history.pushState("no-back", null, null);
            };
        }
    };
//     history.pushState(null, null, window.location.href);
// window.onpopstate = function () {
//     history.go(1);
// };
document.addEventListener("keydown", function (event) {
    if (event.key === "F5" || (event.ctrlKey && event.key === "r")) {
        event.preventDefault();
        alert("تحديث الصفحة غير مسموح!");
    }
});
document.addEventListener("contextmenu", function (event) {
    event.preventDefault();
    alert("تم تعطيل زر الفأرة الأيمن!");
});
// window.addEventListener("beforeunload", function (event) {
//     event.preventDefault();
//     event.returnValue = "هل أنت متأكد أنك تريد مغادرة الصفحة؟";
// });
history.pushState(null, null, document.URL);
history.pushState(null, null, document.URL);
window.onpopstate = function () {
    history.go(1);
};
history.pushState(null, null, location.href);
window.onpopstate = function () {
    history.pushState(null, null, location.href);
};

</script>



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
