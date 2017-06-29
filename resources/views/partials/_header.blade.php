        <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button class="hamburger btn-link">
                                        <span class="hamburger-inner"></span>
                                    </button>
                                    <a id="sidebar-anchor" class="glyphicon glyphicon-eye-open btn-link navbar-link hidden-xs" 
                                    title="Yarr! Drop the anchors! (and keep the sidebar open)" 
                                    data-unstick="Unstick the sidebar" 
                                    data-toggle="tooltip" data-placement="bottom"></a>

                                    <ol class="breadcrumb hidden-xs">
                                        <li class="active"><i class="voyager-world"></i> @yield('title')</li>
                                    </ol>
                                </div>
                                
                                @include('partials._top_menu') 

                            </div>
        </nav> 
            <!-- /.navbar-header --> 