        <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                        @php 
                                               $hidden0='hidden';
                                               $hidden1='hidden'; 
                                               $hidden2='hidden'; 
                                               $hidden3='hidden';
                                               $hidden4='hidden';
                                               $hidden5='hidden';
                                               $url= $_SERVER["REQUEST_URI"]; 

                                               if(strncmp($url,"/puntos-de-acopio",7)===0){ 
                                                    $hidden1=' '; 
                                                } 
                                                if(strncmp($url,"/sponsors",9)===0){ 
                                                    $hidden2=' '; 
                                                } 
                                                if(strncmp($url,'/usuarios',9)===0){ 
                                                    $hidden3=' '; 
                                                }
                                                if(strncmp($url,'/',9)===0){ 
                                                    $hidden0=' '; 
                                                }
                                                if(strncmp($url,'/almacen',9)===0){ 
                                                    $hidden4=' '; 
                                                }
                                                if(strncmp($url,'/perfil',9)===0){ 
                                                    $hidden5=' '; 
                                                }                                     
                                            @endphp
                                    <ol class="breadcrumb {{$hidden0}}">                 
                                        <li><samp class="glyphicon glyphicon-stats"></samp> @yield('title')</li></ol>
                                    <ol class="breadcrumb {{$hidden1}}">                 
                                        <li><samp class="icon voyager-world"></samp> @yield('title')</li></ol>
                                    <ol class="breadcrumb {{$hidden2}}">
                                        <li ><samp class="icon voyager-people"></samp> @yield('title')</li></ol>
                                    <ol class="breadcrumb {{$hidden3}}">
                                        <li ><samp class="icon voyager-person"></samp> @yield('title')</li></ol>
                                    <ol class="breadcrumb {{$hidden4}}">                 
                                        <li><samp class="icon voyager-bag"></samp> @yield('title')</li></ol>
                                    <ol class="breadcrumb {{$hidden5}}">                 
                                        <li><img src=" {{ URL::to('/') }}/uploads/avatars/{{ Auth::user()->imagen }} " class="profile-img"> @yield('title')</li></ol>

                                </div>
                                
                                @include('partials._top_menu') 

                            </div>
        </nav> 
            <!-- /.navbar-header --> 