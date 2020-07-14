
<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('public/default/images/pc/favicon.png')}}" type="image/gif">
   
    <!-- phần SEO -->
    @yield('seo')
    <!-- kết thúc phần SEO -->
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!};
    </script>
    <!-- ajax setup laravel để không báo lỗi 419 -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link id="pagestyle" rel="stylesheet" type="text/css" href="" />
    <link rel="stylesheet" href="{{asset('public/default/css/bootstrap.min.css')}}">
    <script src="{{asset('public/default/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/default/js/script_pc_mb.js')}}"></script>
    <script>
        function layoutHandler() {
        var styleLink = document.getElementById("pagestyle");

        if (window.innerWidth < 480) {
            styleLink.setAttribute("href", "{{asset('public/default/css/mb_style.css')}}");
        }else if (window.innerWidth < 1024) {
            styleLink.setAttribute("href", "{{asset('public/default/css/mb_style.css')}}");
            }else{
                styleLink.setAttribute("href", "{{asset('public/default/css/pc_style.css')}}");
                }
        }
        window.onresize = layoutHandler;
        layoutHandler();
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155121295-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-155121295-1');
    </script>
    
</head>
<body>
    
    @include('default.layouts.header')
    @yield('content')
    @include('default.layouts.footer')
    
    <div class="scrolltop" style="display: block;">
        <div class="scroll icon">
          <img style="width:45px" src="{{asset('public/default/images/pc/go-top.png')}}" alt="">
        </div>
    </div>
    <!-- js cho thanh menu mb -->
    <script type="text/javascript" src="{{asset('public/default/js/menu.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/default/js/mb.js')}}"></script>
    <!-- kết thúc cho thanh menu mb -->
    <script src="{{asset('public/default/js/ajax.js')}}"></script>
    <script src="{{asset('public/default/js/bootstrap.min.js')}}"></script>

</body>
</html>

