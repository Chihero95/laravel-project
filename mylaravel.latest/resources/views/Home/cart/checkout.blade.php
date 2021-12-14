@extends('home.layout.app')
@section('breadcrumbs')
    @include('home.includes.breadcrumbs',array("title" => 'Thanh toán', 'url' => route('home.checkout')))
@endsection
@section('content')
<style>
    textarea {
        width: 100%;
        border-radius: 3px;
        border-radius: 0px;
        color: #333 !important;
        border: none;
        background: #F6F7FB;
        padding: 0 20px;
    }
</style>
<section class="shop checkout section">
    <div class="container">
        <!-- Form -->
        <form class="form" method="post" action="{{ route('home.checkout.post') }}">
            @csrf
        <div class="row">
            <div class="col-lg-8 col-12">
                @include('includes.message')
                <div class="checkout-form">
                    <h2>Thanh Toán</h2>
                    {{-- <p>Please register in order to checkout more quickly</p> --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Họ Tên<span>*</span></label>
                                    <input type="text" name="name" value="{{ old('name', auth()->user() ? auth()->user()->name : '')}}" placeholder="Nhập họ tên">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Địa chỉ email<span>*</span></label>
                                    <input type="text" name="email" value="{{ old('email', auth()->user() ? auth()->user()->email : '')}}" placeholder="Nhập địa chỉ email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Số điện thoại<span>*</span></label>
                                    <input type="text" name="phone" value="{{ old('phone', auth()->user() ? auth()->user()->number_phone : '')}}" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Địa chỉ<span>*</span></label>
                                    <textarea name="address" rows="4" placeholder="Nhập địa chỉ">{{ old('address', auth()->user() ? auth()->user()->address : '')}}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Ghi chú </label>
                                    <textarea name="note" rows="4" placeholder="Nhập ghi chú">{{ old('note')}}</textarea>
                                </div>
                            </div>
                            @if(auth()->guest())
                                <div class="col-12">
                                    <div class="form-group create-account">
                                        <input id="cbox" type="checkbox" name="createUser">
                                        <label>Bạn có muốn tạo tài khoản không ?</label>
                                    </div>
                                </div>
                            @endif
                        </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>Giỏ hàng</h2>
                        <div class="content">
                            <ul>
                                <li>Tiền : <span> {{ $cartSubTotal }} VNĐ</span></li>
                                <li>Phí VAT : <span>10%</span></li>
                                <li class="last">Tổng tiền : <span>{{$cartTotal}} VNĐ</span></li>
                            </ul>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>Phương thức thanh toán</h2>
                    </div>
                    <!--/ End Order Widget -->
                    <!-- Payment Method Widget -->
                    <div class="single-widget payement">
                        <div class="content">
                            <img src="{{ asset('home/images/payment-method.png') }}" alt="#">
                        </div>
                    </div>
                    <!--/ End Payment Method Widget -->
                    <!-- Button Widget -->
                    <div class="single-widget get-button">
                        <div class="content">
                            <div class="button">
                                <button type="submit" class="btn">Thanh Toán</button>
                            </div>
                        </div>
                    </div>
                    <!--/ End Button Widget -->
                </div>
            </div>
        </div>
    </form>
    <!--/ End Form -->
    </div>
</section>
@stop