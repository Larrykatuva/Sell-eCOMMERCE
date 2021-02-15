<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
        <!-- Font awesome -->
        <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="{{asset('css/nav.css')}}">
        
        <title>Sidebar sub menus</title>
    </head>
    <body>
        <nav style="margin-top: -32px;" class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div id="body-pd">
            <div class="l-navbar" id="navbar">
                <nav class="nav">
                    <div>
                        <div class="nav__brand">
                            <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                            <a href="#" class="nav__logo">Bedimcode</a>
                        </div>
                        <div class="nav__list">
                            <a href="#" class="nav__link active">
                                <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                                <span class="nav__name">Dashboard</span>
                            </a>
                            <a href="#" class="nav__link">
                                <ion-icon name="chatbubbles-outline" class="nav__icon"></ion-icon>
                                <span class="nav__name">Messenger</span>
                            </a>
    
                            <div  class="nav__link collapse">
                                <ion-icon name="folder-outline" class="nav__icon"></ion-icon>
                                <span class="nav__name">Projects</span>
    
                                <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>
    
                                <ul class="collapse__menu">
                                    <a href="#" class="collapse__sublink">Data</a>
                                    <a href="#" class="collapse__sublink">Group</a>
                                    <a href="#" class="collapse__sublink">Members</a>
                                </ul>
                            </div>
    
                            <a href="#" class="nav__link">
                                <ion-icon name="pie-chart-outline" class="nav__icon"></ion-icon>
                                <span class="nav__name">Analytics</span>
                            </a>
                            <div class="nav__link collapse">
                                <ion-icon name="people-outline" class="nav__icon"></ion-icon>
                                <span class="nav__name">Team</span>
    
                                <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>
    
                                <ul class="collapse__menu">
                                    <a href="#" class="collapse__sublink">Data</a>
                                    <a href="#" class="collapse__sublink">Group</a>
                                    <a href="#" class="collapse__sublink">Members</a>
                                </ul>
                            </div>
                            <a href="#" class="nav__link">
                                <ion-icon name="settings-outline" class="nav__icon"></ion-icon>
                                <span class="nav__name">Settings</span>
                            </a>
                        </div>
                    </div>
    
                    <a href="#" class="nav__link">
                        <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Log Out</span>
                    </a>
                </nav>
            </div>
    
            <h1>Componentes</h1>
            <!-- ===== IONICONS ===== -->
            <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
            
            <!-- ===== MAIN JS ===== -->
            <script>
                /*===== EXPANDER MENU  =====*/ 
                const showMenu = (toggleId, navbarId, bodyId)=>{
                const toggle = document.getElementById(toggleId),
                navbar = document.getElementById(navbarId),
                bodypadding = document.getElementById(bodyId)
    
                if(toggle && navbar){
                    toggle.addEventListener('click', ()=>{
                    navbar.classList.toggle('expander')
    
                    bodypadding.classList.toggle('body-pd')
                    })
                }
                }
                showMenu('nav-toggle','navbar','body-pd')
    
                /*===== LINK ACTIVE  =====*/ 
                const linkColor = document.querySelectorAll('.nav__link')
                function colorLink(){
                linkColor.forEach(l=> l.classList.remove('active'))
                this.classList.add('active')
                }
                linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
    
                /*===== COLLAPSE MENU  =====*/ 
                const linkCollapse = document.getElementsByClassName('collapse__link')
                var i
    
                for(i=0;i<linkCollapse.length;i++){
                linkCollapse[i].addEventListener('click', function(){
                    const collapseMenu = this.nextElementSibling
                    collapseMenu.classList.toggle('showCollapse')
    
                    const rotate = collapseMenu.previousElementSibling
                    rotate.classList.toggle('rotate')
                })
            }
            </script>
        </div>
    </body>
</html>