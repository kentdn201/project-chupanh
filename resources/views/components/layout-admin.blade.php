<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<x-layout>
    <body class="w3-light-grey">
        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
            <img src="/images/logo-trang-chu.png" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
            <span>Xin Chào, <strong>{{auth()->user()->name}}</strong></span><br>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
            <form action="/logout" method="post">
                @csrf
                <button class="w3-bar-item w3-button" onclick="notification()" type="submit"><i class="fa fa-arrow-left"></i></button>
            </form>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Danh Mục</h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="/" class="w3-bar-item w3-button w3-padding {{ request()->is('/') ? 'w3-blue' : ''}}"><i class="fa fa-dashboard fa-fw"></i>  Tổng Quan</a>
            <a href="/admin/khach-hang" class="w3-bar-item w3-button w3-padding {{ request()->is('admin/khach-hang') ? 'w3-blue' : ''}}"><i class="fa fa-users fa-fw"></i>  Khách Hàng</a>
            <a href="/admin/danh-muc" class="w3-bar-item w3-button w3-padding {{ request()->is('admin/danh-muc') ? 'w3-blue' : ''}}"><i class="fa fa-list fa-fw"></i>  Danh Mục</a>
            <a href="/admin/carousel" class="w3-bar-item w3-button w3-padding {{ request()->is('admin/carousel') ? 'w3-blue' : ''}}"><i class="fa fa-image fa-fw"></i>  Carousel</a>
            <a href="/admin/lien-he" class="w3-bar-item w3-button w3-padding {{ request()->is('admin/lien-he') ? 'w3-blue' : ''}}"><i class="fa fa-phone fa-fw"></i>  Liên Hệ </a>
            <form action="/logout" method="post">
                @csrf
                <button class="w3-bar-item w3-button w3-padding" onclick="notification()" type="submit"><i class="fa fa-arrow-left"></i>  Đăng xuất</button>
            </form>
        </div>
        </nav>


        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        {{ $slot }}

        <!-- Footer -->
        <x-footer/>

        <!-- End page content -->
        </div>

        <script>
        // Get the Sidebar
        var mySidebar = document.getElementById("mySidebar");

        // Get the DIV with overlay effect
        var overlayBg = document.getElementById("myOverlay");

        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
            overlayBg.style.display = "none";
        } else {
            mySidebar.style.display = 'block';
            overlayBg.style.display = "block";
        }
        }

        // Close the sidebar with the close button
        function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
        }
        </script>

    </body>
</x-layout>

