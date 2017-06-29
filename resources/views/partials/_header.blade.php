        <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button class="hamburger btn-link">
                                        <span class="hamburger-inner"></span>
                                    </button>
                                    <a id="sidebar-anchor" class="glyphicon glyphicon-eye-open btn-link navbar-link hidden-xs" 
                                    title="Desplegar Barra lateral" 
                                    data-unstick="Anular la barra lateral" 
                                    data-toggle="tooltip" data-placement="bottom"></a>

                                    <ol class="breadcrumb hidden-xs">
                                        <li class="active">@yield('title')</li>
                                    </ol>
                                </div>
                                
                                @include('partials._top_menu') 

                            </div>
        </nav> 
            <!-- /.navbar-header --> 