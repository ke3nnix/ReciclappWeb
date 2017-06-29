<ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown profile">
                                        <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><img src="../vendor/imagenReciclaap/users/June2017/cgJcIwVDlZTDhRDGaW92.jpg" class="profile-img"> <span
                                        class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-animated">
                                            <li class="profile-img">
                                                <img src="../vendor/imagenReciclaap/users/June2017/cgJcIwVDlZTDhRDGaW92.jpg" class="profile-img">
                                                <div class="profile-body">
                                                    <h5>{{ Auth::user()->nombre }}</h5>
                                                    <h6>{{ Auth::user()->email }}</h6>
                                                </div>
                                            </li>
                                            <li class="divider"></li>
                                            <li class="class-full-of-rum">
                                                <a href="{{route('perfil')}}" >
                                                    <i class="voyager-person"></i>
                                                    Perfil
                                                </a>
                                            </li>
                                            <li >
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                            </li>
                                        </ul>
                                    </li>
</ul>