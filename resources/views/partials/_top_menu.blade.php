<ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown profile">
                                        <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><img src="../vendor/imagenReciclaap/users/June2017/cgJcIwVDlZTDhRDGaW92.jpg" class="profile-img"> <span
                                        class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-animated">
                                            <li class="profile-img">
                                                <img src="../vendor/imagenReciclaap/users/June2017/cgJcIwVDlZTDhRDGaW92.jpg" class="profile-img">
                                                <div class="profile-body">
                                                    <h5>gus</h5>
                                                    <h6>gustavo@gmail.com</h6>
                                                </div>
                                            </li>
                                            <li class="divider"></li>
                                            <li class="class-full-of-rum">
                                                <a href="{{route('perfil')}}" >
                                                    <i class="voyager-person"></i>
                                                    Profile
                                                </a>
                                            </li>
                                            <li >
                                                <a href="/" target="_blank">
                                                    <i class="voyager-home"></i>
                                                    Home
                                                </a>
                                            </li>
                                            <li >
                                                {{-- <form action="http://localhost:8000/logout" method="POST">
                                                    <input type="hidden" name="_token" value="a04gIM2pLD52IVwRn4cF2AQjU9zE98plx37IbLeH">
                                                    <button type="submit" class="btn btn-danger btn-block">
                                                        <i class="voyager-power"></i>
                                                        Logout
                                                    </button>
                                                </form> --}}

                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                            </li>
                                        </ul>
                                    </li>
</ul>