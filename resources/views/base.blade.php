<!DOCTYPE html> 
<html> 
@include('partials._head') 
 
<body class="flat-blue" style="overflow-x: hidden;"> 
 
    {{-- <div id="voyager-loader"> 
                <img src="{{ URL::to('/') }}/resources/loader-reciclapp.gif" alt="Reciclapp loader"> 
    </div>  --}}
 
 
        <div class="app-container"> 
            <div class="fadetoblack visible-xs"></div> 
            <div class="row content-container"> 
                    @include('partials._header')    
        
 
 
                    @include('partials._sidebar') 
  
 
                <!-- Main Content --> 
                        <div class="container-fluid"> 
                    <div class="side-body padding-top"> 
                        <!--cabecera de la pagina--> 
                        <!-- contenido--> 
                        <div class="page-content"> 
                           <div class="row"> 
                            <div class="col-lg-12"> 
                            </div> 
                            <!-- /.col-lg-12 --> 
                        </div> 
 
                            <div class="alerts"> 
                                <!--alertas--> 
                            </div>         
                            <div style="position: relative; right: -20px"> 
                                 @yield('content') 
                            </div>     
                        </div> 
 
 
                    </div> 
                        </div> 
            </div> 
        </div> 
          <script type="text/javascript"> 
            $(document).ready(function(){ 
                $('ul li').click(function(){ 
                $('li').removeClass("active"); 
                $(this).addClass("active"); 
            }); 
          }); 
        </script> 
       
        <script> 
            (function(){ 
                var appContainer = document.querySelector('.app-container'), 
                sidebar = appContainer.querySelector('.side-menu'), 
                navbar = appContainer.querySelector('nav.navbar.navbar-top'), 
                loader = document.getElementById('voyager-loader'), 
                anchor = document.getElementById('sidebar-anchor'), 
                hamburgerMenu = document.querySelector('.hamburger'), 
                sidebarTransition = sidebar.style.transition, 
                navbarTransition = navbar.style.transition, 
                containerTransition = appContainer.style.transition; 
 
                sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition = 
                appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition =  
                navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = 'none'; 
 
                if (window.localStorage && window.localStorage['voyager.stickySidebar'] == 'true') { 
                    appContainer.className += ' expanded'; 
                    loader.style.left = (sidebar.clientWidth/2)+'px'; 
                    anchor.className += ' active'; 
                    anchor.dataset.sticky = anchor.title; 
                    anchor.title = anchor.dataset.unstick; 
                    hamburgerMenu.className += ' is-active'; 
                } 
 
                navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = navbarTransition; 
                sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition = sidebarTransition; 
                appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition = containerTransition; 
            })(); 
        </script> 
 
       
 
        @include('partials._javascripts') 
 
        @yield('scripts') 
 
</body> 
</html>