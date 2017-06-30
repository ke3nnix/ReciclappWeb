<div class="side-menu sidebar-inverse">
                            <nav class="navbar navbar-default" role="navigation">
                                    <div class="side-menu-container">
                                        <div class="navbar-header">
                                            <a class="navbar-brand" href="{{route('inicio')}}">
                                                <div class="logo-icon-container">
                                                    <img src=" {{ URL::to('/') }}/resources/isotipo-reciclapp.png " alt="Reciclapp">
                                                </div>
                                                <div class="title"><h2 style="margin-top:10px;text-transform: none;">Reciclapp</h2></div>
                                            </a>
                                        </div><!-- .navbar-header -->

                                        <div class="panel widget center bgimage "
                                        style="background-image:url( {{ URL::to('/') }}/resources/backgroud-titulo-panel-de-control.jpg ); ">
                                        <div class="dimmer"></div>
                                        <div class="panel-content" style=" position: relative; float: center;">
                                            <center>
                                            <img style="height: 36px; width: 36px" src=" {{ URL::to('/') }}/uploads/avatars/{{ Auth::user()->imagen }} " class="avatar" alt="{{ Auth::user()->nombre }} avatar" style="margin-right:10px;"></center>
                                            <h4 style="margin:16px 16px 16px 16px;">Panel de control </h4>
                                            {{-- <a href="http://localhost:8000/admin/profile" class="btn btn-primary">Profile</a> --}}
                                            <div style="clear:both"></div>
                                        </div>
                                    </div>

                                </div>
                    <!--menu-->
                                <ul class="nav navbar-nav">




                                    <li>
                                        <a href="{{ route("puntos-de-acopio.index") }}"  target="_self">
                                            <span class="icon voyager-world"></span>
                                            <span class="title">Puntos de Acopio</span>
                                        </a>
                                    </li>


                                    <li>
                                        <a href="{{ route("sponsors.index") }}" target="_self">
                                            <span class="icon voyager-people"></span>
                                            <span class="title">Sponsors</span>
                                        </a>
                                    </li>

                                     <li class="dropdown">
                                        <a href="#tools-dropdown-element" data-toggle="collapse" aria-expanded="false" target="_self">
                                            <span class="icon voyager-person"></span>
                                            <span class="title">Usuarios</span>
                                        </a>
                                        <div id="tools-dropdown-element" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul class="nav navbar-nav">

                                                       <li>
                                                        <a href="/usuarios?tipo=administradores&estado=activo" target="_self">
                                                            <span class="icon voyager-key"></span>
                                                            <span class="title">administradores</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/usuarios?tipo=empleados&estado=activo" target="_self">
                                                            <span class="icon voyager-smile"></span>
                                                            <span class="title">Empleados</span>
                                                        </a>
                                                    </li>
                                                  

                                                </ul>
                                            </div>
                                        </div>
                                    </li>
<!--
                                    <li class="">
                                        <a href="http://localhost:8000/admin/media" target="_self">
                                            <span class="icon voyager-images"></span>
                                            <span class="title">Media</span>
                                        </a>
                                    </li>


                                    <li class="">
                                        <a href="http://localhost:8000/admin/posts" target="_self">
                                            <span class="icon voyager-news"></span>
                                            <span class="title">Posts</span>
                                        </a>
                                    </li>


                                    <li class="">
                                        <a href="http://localhost:8000/admin/pages" target="_self">
                                            <span class="icon voyager-file-text"></span>
                                            <span class="title">Pages</span>
                                        </a>
                                    </li>


                                    <li class="">
                                        <a href="http://localhost:8000/admin/categories" target="_self">
                                            <span class="icon voyager-categories"></span>
                                            <span class="title">Categories</span>
                                        </a>
                                    </li>


                                    <li class="dropdown">
                                        <a href="#tools-dropdown-element" data-toggle="collapse" aria-expanded="false" target="_self">
                                            <span class="icon voyager-tools"></span>
                                            <span class="title">Tools</span>
                                        </a>
                                        <div id="tools-dropdown-element" class="panel-collapse collapse ">
                                            <div class="panel-body">
                                                <ul class="nav navbar-nav">




                                                    <li class="">
                                                        <a href="http://localhost:8000/admin/menus" target="_self">
                                                            <span class="icon voyager-list"></span>
                                                            <span class="title">Menu Builder</span>
                                                        </a>
                                                    </li>


                                                    <li class="">
                                                        <a href="http://localhost:8000/admin/database" target="_self">
                                                            <span class="icon voyager-data"></span>
                                                            <span class="title">Database</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </li>


                                    <li class="">
                                        <a href="http://localhost:8000/admin/settings" target="_self">
                                            <span class="icon voyager-settings"></span>
                                            <span class="title">Settings</span>
                                        </a>
                                    </li>
-->
                                </ul>
                    <!--finish-->
                            </nav>
                        </div>