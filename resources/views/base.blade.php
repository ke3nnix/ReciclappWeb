<!DOCTYPE html>
<html lang="en">

@include('partials._head')

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="background-color: #287F22" > 
            
            @include('partials._header')          
            
            @include('partials._top_menu')    

            @include('partials._sidebar')

        </nav>

        <div id="page-wrapper" style="background-color:rgba(51, 51, 51, 1); position: relative; right: 190px">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                    <h1 class="page-header" style="color:white; position: relative; right: -70px">@yield('title')</h1>
                    </center>
                </div>
                <!-- /.col-lg-12 -->
            </div>


            <div  style="position: relative; right: -70px">
                @yield('content')
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    @include('partials._javascripts')

    @yield('scripts')

</body>

</script>
</html>