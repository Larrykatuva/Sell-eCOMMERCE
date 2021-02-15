<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mobile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <!-- Font awesome -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    
    {{-- dataTables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <nav style="background: green; color:#fff;" class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon text-white"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <a style="background: #FF9933;" href="/product/create" class=" mt-1 text-white btn btn-sm">Sell Online</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a href="/profile" class="dropdown-item">Profile</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">
                            @if (auth()->user()->userProfile)
                                <img style="border-radius: 50%" width="40px" src="storage/profile_images/{{auth()->user()->userProfile->profile_image}}">
                            @endif
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div id="admin-container">
        <div id="row">
            <div id="sidebar">
                <div id="sidebar-title">
                    <h3 class="text-white"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</h3>
                </div>
                <hr>
                <div id="sidebar-list">
                    <ul>
                        <li><a href="" id="home" class="text-white"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                        <hr>
                        <li><a href="" id="users" class="text-white"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Catalog</a></li>
                        <hr>
                        <li><a href="" id="sales" class="text-white"><i class="fa fa-balance-scale" aria-hidden="true"></i>Sales</a></li>
                        <hr>
                        <li><a href="" id="home" class="text-white"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                        <hr>
                        <li><a href="" id="users" class="text-white"><i class="fa fa-users" aria-hidden="true"></i>Users</a></li>
                        <hr>
                        <li><a href="" id="sales" class="text-white"><i class="fa fa-balance-scale" aria-hidden="true"></i>Sales</a></li>
                    </ul>
                </div>
            </div>
            <div id="main-content">
                <div id="main-nav">
                    <ul>
                        <li>
                            <img onclick="showMenu()" src="{{asset('images/menu.png')}}" alt="">
                        </li>
                        <li class="float-right">
                            <img src="{{ asset('images/sms.png')}}" alt="">
                        </li>
                        <li class="float-right">
                            <img src="{{ asset('images/alert1.png')}}" alt="">
                        </li>
                        <li class="float-right">
                            <img src="{{ asset('images/bell2.jpg')}}" alt="">
                        </li>
                    </ul>
                </div>
                <div id="admin-home">
                    <div id="home-top">
                        <h3>Dashboard</h3>
                        <hr>
                        <div id="row">
                            <div id="menu-card" class="bg-success text-white">
                                <div id="row">
                                    <div id="card-1-1"><i class="fa fa-gavel" aria-hidden="true"></i></div>
                                    <div id="card-1-2">
                                        <h4>Bids Daily</h4>
                                        <p>29</p>
                                    </div>
                                </div>
                            </div>
                            <div id="menu-card" class="bg-primary text-white">
                                <div id="row">
                                    <div id="card-1-1"><i class="fa fa-usd" aria-hidden="true"></i></div>
                                    <div id="card-1-2">
                                        <h4>Earnings Daily</h4>
                                        <p>Ksh 4000</p>
                                    </div>
                                </div>
                            </div>
                            <div id="menu-card" class="bg-danger text-white">
                                <div id="row">
                                    <div id="card-1-1"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>
                                    <div id="card-1-2">
                                        <h4>Unmeet Bids</h4>
                                        <p>1</p>
                                    </div>
                                </div>
                            </div>
                            <div id="menu-card" class="bg-info text-white">
                                <div id="row">
                                    <div id="card-1-1"><i class="fa fa-users" aria-hidden="true"></i></div>
                                    <div id="card-1-2">
                                        <h4>Daily Users</h4>
                                        <p>400</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="home-content">
                        <table style="width: 100%" id="users-table" class="table table-hover bg-white">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
      

    {{-- dataTables --}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

    <!-- ===== Nav JS ===== -->
    <script src="{{asset('js/nav.js')}}"></script>

    <script type="text/javascript">
        //users table data
        var table1 = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('all.users') }}",
            columns: [
                {data:'id', name:'id'},
                {data:'name', name:'name'},
                {data:'email', name:'email'},
                {data:'action', name:'action', orderable: false, searchable: false}
            ]
        });

        //products table data
        var table2 = $('#catalog-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('all.users') }}",
            columns: [
                {data:'id', name:'id'},
                {data:'name', name:'name'},
                {data:'email', name:'email'},
                {data:'action', name:'action', orderable: false, searchable: false}
            ]
        });
    </script>
    <script>
        function showMenu(){
            var sidebar = document.getElementById('sidebar');
            var main = document.getElementById('main-content');

            if(window.getComputedStyle(sidebar).display === "none"){
                sidebar.style.display = 'block';
                main.style.flexBasis = '80%';
            }else{
                sidebar.style.display = 'none';
                main.style.flexBasis = '100%';
            }
        }
    </script>
    
  </body>
</html>

