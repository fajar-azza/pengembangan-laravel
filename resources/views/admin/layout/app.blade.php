
<!DOCTYPE html>
<html lang="en">
<head>
 <!-- disini link untuk style -->
    @include('admin.components.style')
    <!-- END PAGE LEVEL STYLES -->
</head>
<body class="layout-boxed ">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container container-xxl">
        <!-- masukkan link header -->
         @include('admin.components.header')
    </div>
    <!--  END NAVBAR  -->


    
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <!-- masukkan sidebar -->
             @include('admin.components.sidebar')

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            
            <!-- masukkan main page  -->
             @yield('content')

            <!--  BEGIN FOOTER  -->

            <!-- masukkan footer -->
             @include('admin.components.footer')

            <!--  END CONTENT AREA  -->
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    <!-- masukkan script -->
    @include('admin.components.script')
        
</body>
</html>