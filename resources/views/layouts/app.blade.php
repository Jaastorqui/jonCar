<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >


    <!-- Scripts -->
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" ></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


    <script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bloodhound.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
</head>
<body>
    <div id="app" class="container">

        <nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('index') }}">{{ config('app.name') }}</a>

            <div class="collapse navbar-collapse" id="containerNavbar">
            <ul class="navbar-nav mr-auto">
            </ul>
                
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    
                    <a class="nav-link" data-toggle="modal" data-target="#modalLanguage" href="#">
                        @lang('text.cambiar_idioma')
                    </a>
                </li>

                @if (Auth::guest())
                    <li  class="list-item"><a  class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li  class="list-item"><a  class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    
                    <li class="list-item">
                        <span class="nav-link">{{ Auth::user()->name }} </span>
                    </li>

                    <li class="list-item">
                        <span class="nav-link"><a href="{{ route('home.dashboard') }}" >Dashboard</a></span>
                    </li>

                    <li class="list-item">
                        <span class="nav-link">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </span>
                    </li>
                @endif
            </ul>
            </div>
        </nav>

        <!-- modal -->
            <div class="modal fade" id="modalLanguage" tabindex="-1" role="dialog" aria-labelledby="modalLanguage" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Change Language</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <a type="button" class="btn btn-primary" href="{{ url('lang/es') }}"  >
                                @lang("text.idioma_es")
                            </a>
                            <a type="button" class="btn btn-primary" href="{{ url('lang/en') }}"  >
                                @lang("text.idioma_en")
                            </a>
                            
                        </div>
                    </div>
                </div>
                </div>

        <!-- end modal -->
        

        @yield('content')
    </div>

    <!-- Footer -->
        <footer class="mainfooter" role="contentinfo">
            <div class="footer-middle">
            <div class="container">
                <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                    <h4>Address</h4>
                    <address>
                        <ul class="list-unstyled">
                            <li>Calle castellana, 2</li>
                            <li>xxx-xxx-xxx</li>
                        </ul>
                    </address>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                    <h4>Acerca de {{ config('app.name') }}</h4>
                    <ul class="list-unstyled">
                        <li><a href="/we-are">¿Quienes somos?</a></li>
                        <li><a href="#">Principios</a></li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                    <h4>Informacion acerca de {{ config('app.name') }}</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Como utilizar el servicio</a></li>
                        <li><a href="#">Niveles de seguridad</a></li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                    <h4>Social</h4>
                    <ul class="list-unstyled class="list-inline"">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true" ></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true" ></i></a></li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                    <!--Footer Bottom-->
                    <p class="text-xs-center">&copy; Copyright {{ date("Y") }} - {{ config('app.name') }}.  All rights reserved.</p>
                    </div>
                </div>
                </div>
            </div>
            </footer>
    <!-- End footer -->



    

</body>
</html>
