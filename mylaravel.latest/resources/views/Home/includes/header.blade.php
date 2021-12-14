    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                            <li><i class="ti-email"></i> support@shophub.com</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            @if (Auth::check())
                                <li><i class="ti-user"></i> <a href="#">Tài khoản</a></li>
                                <li><i class="fa fa-user-circle-o"></i>Xin chào {{Auth::user()->name}} !</li>
                                <li><i class="ti-power-off"></i><a href="{{ route('home.logout') }}">Đăng xuất</a></li>
                            @else
                                <li><i class="ti-power-off"></i><a href="{{ route('home.login') }}">Đăng nhập</a></li>
                                <li><i class="ti-user"></i> <a href="{{ route('home.register') }}">Đăng kí</a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('home/images/logo.png') }}" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"><div class="slicknav_menu"><a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_collapsed" style="outline: none;"><span class="slicknav_menutxt"></span><span class="slicknav_icon slicknav_no-text"><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span></span></a><ul class="slicknav_nav slicknav_hidden" aria-hidden="true" role="menu" style="display: none;">
                                                <li class="active"><a href="#" role="menuitem" tabindex="-1">Home</a></li>
                                                <li><a href="#" role="menuitem" tabindex="-1">Product</a></li>												
                                                <li><a href="#" role="menuitem" tabindex="-1">Service</a></li>
                                                <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="-1" class="slicknav_item slicknav_row" style="outline: none;"><a href="#" tabindex="-1">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                    <span class="slicknav_arrow">►</span></a><ul class="dropdown slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                                                        <li><a href="cart.html" role="menuitem" tabindex="-1">Cart</a></li>
                                                        <li><a href="checkout.html" role="menuitem" tabindex="-1">Checkout</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#" role="menuitem" tabindex="-1">Pages</a></li>									
                                                <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="-1" class="slicknav_item slicknav_row" style="outline: none;"><a href="#" tabindex="-1">Blog<i class="ti-angle-down"></i></a>
                                                    <span class="slicknav_arrow">►</span></a><ul class="dropdown slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                                                        <li><a href="blog-single-sidebar.html" role="menuitem" tabindex="-1">Blog Single Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.html" role="menuitem" tabindex="-1">Contact Us</a></li>
                                            </ul></div></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <form method="GET" action="{{route('home')}}">
                                <select name="id">
                                    <option value="all" @if(!Request::has('q') || Request::input('id') == 'all') selected @endif>Tất cả</option>
                                    @foreach($categorys as $catgory)
                                        <option value="{{ $catgory->id }}" @if(Request::has('q') && Request::input('id') == $catgory->id) selected @endif> {{ $catgory->name }}</option>
                                    @endforeach
                                </select>
                                <input name="q" placeholder="Nhập từ khóa..." type="search" value="{{Request::input('q')}}">
                                <button class="btnn" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        {{-- <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </div> --}}
                        <div class="sinlge-bar shopping">
                            <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ Cart::count() }}</span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>{{ Cart::count() }} sản phẩm</span>
                                    <a href="{{route('home.cart')}}">Xem giỏ hàng</a>
                                </div>
                                <ul class="shopping-list">
                                    @foreach ($carts as $cart)
                                        <li>
                                            <a href="{{ route('home.cart.delete',[$cart->rowId]) }}" class="remove" title="Xóa sản phẩm"><i class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="{{ route('home.product.detail',[$cart->options['slug']]) }}"><img src="{{ asset('uploads/products/' . $cart->options['image']) }}" alt="#"></a>
                                            <h4><a href="{{ route('home.product.detail',[$cart->options['slug']]) }}">{{ $cart->name }}</a></h4>
                                            <p class="quantity">{{ $cart->qty }} - <span class="amount">{{number_format($cart->price, 0, ",",".")}} VNĐ</span></p>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Tổng tiền : </span>
                                        <span class="total-amount">{{$cartSubTotal}} VNĐ</span>
                                    </div>
                                    <a href="{{route('home.checkout')}}" class="btn animate">Thanh Toán</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">	
                                    <div class="nav-inner">	
                                        <ul class="nav main-menu menu navbar-nav">
                                                <li class="@if(Request::fullUrl() == route('home')) active @endif"><a href="{{ route('home') }}">Trang Chủ</a></li>
                                              @foreach ($categorys as $category)
                                                <li class="@if(Request::fullUrl() == route('home.category.get',[$category->slug])) active @endif">
                                                    @if($category->childrenRecursive()->count())
                                                        <a href="{{ route('home.category.get',[$category->slug]) }}">{{ $category->name }} <i class="ti-angle-down"></i></a>
                                                        <ul class="dropdown">
                                                            @foreach($category->childrenRecursive as $k => $children) 
                                                                <li><a href="{{ route('home.category.get',[$children->slug]) }}">{{ $children->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <a href="{{ route('home.category.get',[$category->slug]) }}">{{ $category->name }} </a>
                                                    @endif
                                                </li>
                                              @endforeach  
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
