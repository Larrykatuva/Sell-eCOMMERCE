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
    <div class="container">
        <div id="card123">
            <div id="row">
                <div id="col-p-4">
                    <div class="card">
                        <div class="card-header">My Shop Account</div>
                        <div class="card-body">
                            <p class="card-text">Orders</p>
                            <p class="card-text">Pending Reviews</p>
                            <p class="card-text">My Wish</p>
                            <p class="card-text">My Shop</p>
                        </div>
                    </div>
                </div>
                <div id="col-p-8">
                    <div class="card">
                        <div class="card-header font-weight-bold">Account Overview</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <h5 id="profile-header">Account Details 
                                            <span id="edit-pen" class="float-right"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                        </h5>
                                        <hr>
                                        <div id="profile-body">
                                            <p id="profile-name">Lawrence Katuva</p>
                                            <p id="profile-email"><i class="fa fa-envelope text-danger mr-2" aria-hidden="true"></i>{{$user->email}}</p>
                                            <p id="profile-email"><i class="fa fa-phone text-danger mr-2" aria-hidden="true"></i>+254 {{$user->userProfile->phone}}</p>
                                            <a href="" id="profile-link">CHANGE PASSWORD</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <h5 id="profile-header">Address Location 
                                            <span id="edit-pen" class="float-right"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                        </h5>
                                        <hr>
                                        <div id="profile-body">
                                            <p id="profile-name">Lawrence Katuva</p>
                                            <p id="profile-email">Kahawa-Nairobi</p>
                                            <p id="profile-email">Kahawa Wendani/ Kenyatta University, Nairobi</p>
                                            <a href="" id="profile-link">CHANGE PASSWORD</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-body" style="padding: 5px">
            <div id="a-info-table">
                <a href="/product/create" class="btn btn-success btn-sm float-right">Sell Online</a>
                <h3>Product catalog</h3>
                <table id="products-table" class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div id="a-page" class=" mt-2">
        <a href="/" class="card-link"><i class="fa fa-chevron-left mr-2 mb-3" aria-hidden="true"></i>Back</a>
        <div id="card1">
            <div id="a-title">
                <h3 class="text-center">{{$user->name}} Profile</h3>
            </div>
            <div id="a-info">
                @include('inc.messages')
                @if ($user->userProfile)
                    <div id="row">
                        <div class="text-center" id="a-col-1">
                            <img src="storage/profile_images/{{$user->userProfile->profile_image}}" alt="">
                            <br>
                            <a href="/profile/{{$user->id}}/edit" class="btn btn-success btn-sm mt-2">Edit Profile</a>
                        </div>
                        <div id="a-col-2">
                            <div id="a-user">
                                <div id="one">
                                    <h4>Contact Information</h4>
                                    <hr>
                                    <p><strong><i class="fa fa-envelope text-danger mr-2" aria-hidden="true"></i></strong>{{$user->email}}</p>
                                    <p><strong><i class="fa fa-phone text-danger mr-2" aria-hidden="true"></i></strong>0{{$user->userProfile->phone}}</p>
                                    <p><strong><i class="fa fa-id-card-o text-danger mr-2" aria-hidden="true"></i></strong>0{{$user->userProfile->national_id}}</p>
                                </div>
                            </div>
                        </div>
                        <div id="two">
                            <hr>
                            <div id="three">
                                <h4>Sell Online</h4>
                                <p>
                                    Several studies suggest that in-store purchase aren't thing of the past 
                                and online in-store retail can coexist. If you're intrested in 
                                opening a retail business, it's important to plan for the event. We have experts 
                                in the industry who run our ecommerce.
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="a-info-table">
                        <a href="/product/create" class="btn btn-success btn-sm float-right">Sell Online</a>
                        <h3>Product catalog</h3>
                        <table id="products-table" class="table table-sm">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                    </div>
                @else
                    @if ($user->userShop)
                        <p>Go to <a href="/shop" class="btn btn-success btn-sm">{{$user->userShop->name}}</a></p>
                    @else
                        <p>Please complete your profile to view your profile 
                            information.
                        </p>
                        <p>To completet your profile click button bellow.</p>
                        <a href="/profile/create" class="btn btn-success btn-sm">Complete Profile</a>
                    @endif
                @endif
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
        var table1 = $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.products') }}",
            columns: [
                {data:'id', name:'id'},
                {data:'name', name:'name'},
                {data:'quantity', name:'quantity'},
                {data:'price', name:'price'},
                {data:'action', name:'action', orderable: false, searchable: false}
            ]
        });
    </script>
    
  </body>
</html>
