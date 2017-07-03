<div class="side-menu sidebar-inverse">
                            <nav class="navbar navbar-default" role="navigation">
                                    <div class="side-menu-container">
                                        <div class="navbar-header">
                                            <a class="navbar-brand" href="{{route('inicio')}}" >
                                                <div class="logo-icon-container">
                                                    <img src=" {{ URL::to('/') }}/resources/isotipo-reciclapp.png " alt="Reciclapp">
                                                </div>
                                                <div class="title"><h2 style="margin-top:10px;text-transform: none;">Reciclapp</h2></div>
                                            </a>
                                        </div><!-- .navbar-header -->

                                        <div class="panel widget center bgimage "
                                        style="background-image:url( {{ URL::to('/') }}/resources/backgroud-titulo-panel-de-control.jpg">
                                        <div class="dimmer"></div>
                                        <div class="panel-content" style=" position: relative; float: center;">
                                            <center>
                                            <img style="height: 36px; width: 36px" src=" {{ URL::to('/') }}/resources/panel-de-control.png " class="avatar" alt="{{ Auth::user()->nombre }} avatar" style="margin-right:10px;"></center>
                                            <h4>Centro de control</h4>
                                            {{-- <a href="http://localhost:8000/admin/profile" class="btn btn-primary">Profile</a> --}}
                                            <div style="clear:both"></div>
                                        </div>
                                    </div>

                                </div>
                    <!--menu-->
                                <ul class="nav navbar-nav">

                                @php 
                                        $class1=''; 
                                        $class2=''; 
                                        $class3=''; 
                                        $url= $_SERVER["REQUEST_URI"]; 
                                        
                                        if(strncmp($url,"/puntos-de-acopio",7)===0){ 
                                                $class1='active'; 
                                            } 
                                            if(strncmp($url,"/sponsors",9)===0){ 
                                                $class2='active'; 
                                            } 
                                            if(strncmp($url,'/usuarios',9)===0){ 
                                                    $class3='active'; 
                                            }                                     
                                @endphp


                                    <li class="{{ $class1 }}">
                                        <a href="/puntos-de-acopio?estado=activo"  target="_self">
                                            <span class="icon voyager-world"></span>
                                            <span class="title">Puntos de Acopio</span>
                                        </a>
                                    </li>


                                    <li class="{{ $class2 }}">
                                        <a href="/sponsors?estado=activo" target="_self">
                                            <span class="icon voyager-people"></span>
                                            <span class="title">Sponsors</span>
                                        </a>
                                    </li>

                                     <li class="dropdown {{ $class3 }}" >
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
                                                  
z
                                                </ul>
                                            </div>
                                        </div>
                                    </li>-->
                                </ul>
                    <!--finish-->
                            </nav>

 		            <script type="text/javascript"> 
                        $(function(){ 
                            // this will get the full URL at the address bar 
                            var url = window.location.href;  
 
                            // passes on every "a" tag  
                            $("#portada a").each(function() { 
                                // checks if its the same on the address bar 
                                if(url == (this.href)) {  
                                    $(this).closest("li").addClass("active"); 
                                } 
                            }); 
                        }); 
                    </script> 

                        </div>