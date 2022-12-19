<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Laravel: @if($title) {{ $title }} @endif </title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">  

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Logo
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

                        <li class="nav-item">
                            <a class="nav-link" href="/">{{ __('Home') }}</a>
                        </li>

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

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                @if (!empty($product_data))
                    @foreach ($product_data as $row)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <!-- <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap"> -->
                            <div class="card-body">
                                <h4 class="card-title"><a href="product_details/{{$row['id']}}" title="View Product">{{$row['name']}}</a></h4>
                                <p class="card-text">{{$row['description']}}</p>
                                <div class="row">
                                    <div class="col">
                                        <p class="btn btn-danger btn-block">{{$row['price']}} $</p>
                                    </div>
                                    <div class="col">
                                        <a href="product_details/{{$row['id']}}" class="btn btn-success btn-block">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else

                <div class="alert alert-danger col-md-12 text-center" >
                  No Product Found !
                </div>
                @endif
    
                </div>
            </div>

        </div>
    </div>

</body>
</html>