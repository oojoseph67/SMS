<!DOCTYPE html>
    <html lang="en">

    <head>
        @include('layouts.shared/title-meta', ['title' => $title])
        @include('layouts.shared/head-css')
        {{-- @include('layouts.shared/head-css', ["demo" => "modern"]) --}}
    </head>

    <body @yield('body-extra')>
    
        <!-- Pre-loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">Loading...</div>
            </div>
        </div>
        <!-- End Preloader-->
        <!-- Begin page -->
        <div id="wrapper">
            @include('layouts.shared/teachertopbar')

            @include('layouts.shared/teacherleft-sidebar')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">                    
                    @yield('content')
                </div>
                <!-- content -->

                @include('layouts.shared/footer')

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->


        @include('layouts.shared/footer-script')
        
    </body>
</html>