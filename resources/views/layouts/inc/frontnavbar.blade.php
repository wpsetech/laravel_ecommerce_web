<?php
    use App\Http\Controllers\cartController;
    $total = cartController::cartcount()


?>
<nav class="navbar  navbar-expand-lg navbbg-light bg-light">
    <div class="container">
        <a class="navbar-brand text-light" href="{{url('/')}}"><h4 class="text-primary">E-STORE</h4></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}"><p class="py-1">Home</p> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('category')}}"><p class="py-1">Category</p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('allproducts')}}"><p class="py-1">Products</p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('cart')}}"><p class="py-1"><i class="fas fa-cart-arrow-down"></i>Cart
                            <span class="badge badge-pill bg-success ">{{$total}}</span>
                        </p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('wishlist')}}"><p class="py-1"><i class="fas fa-heart"></i>Wishlist
{{--                            <span class="badge badge-pill bg-success ">{{$total}}</span>--}}

                        </p></a>
                </li>

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><button type="button" class="btn btn-sm btn-outline-primary">{{ __('Login') }}</button></a>
{{--                            <a class="nav-link" href="{{ route('login') }}"><p>{{ __('Login') }}</p></a>--}}
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn btn-sm bg-gradient-primary">{{ __('Register') }}</button></a>

{{--                            <a class="nav-link" href="{{ route('register') }}"><p>{{ __('Register') }}</p></a>--}}
                        </li>
                    @endif
                @else

                    <div class="dropdown">
                        <button class="btn btn-sm mt-2 bg-gradient-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="{{url('my-orders')}}">My Orders</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{url('/home')}}">My Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>


                        </ul>
                    </div>

                @endguest

            </ul>

        </div>
    </div>

</nav>
