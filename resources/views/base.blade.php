<!DOCTYPE html>
<html lang="en">

@include('partials._head')

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            @include('partials._header')          
            
            @include('partials._top_menu')    

            @include('partials._sidebar')

        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('title')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            
                @yield('content')
        

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    @include('partials._javascripts')

    @yield('scripts')

</body>

</html>