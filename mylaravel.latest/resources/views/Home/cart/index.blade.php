@extends('home.layout.app')
@section('breadcrumbs')
    @include('home.includes.breadcrumbs',array("title" => "Giỏ hàng", 'url' => route('home.cart')))
@endsection
@section('content')
<style>
    .shopping-cart {
        background:#fff !important;
        padding: 0px 0 !important;
    }
    .section {
        padding: 40px 0 !important;
    }
    .table.shopping-summery {
        border: 1px solid #eee !important;
    }
    .shopping-summery thead {
        background: #ee4d2d !important;
    }
</style>
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <form action="{{ route('home.cart.update') }}" method="post">
                    @csrf
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>Sản phẩm</th>
                                <th>Tên</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Tổng tiền</th> 
                                <th class="text-center"><a href="{{ route('home.cart.deleteAll') }}"><i class="ti-trash remove-icon"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($carts->isEmpty())
                                <tr><td colspan="6" style="text-align: center;">Không có sản phẩm nào</td></tr>
                            @else
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td class="image" data-title="No"><img src="{{ asset('uploads/products/' . $cart->options['image']) }}" alt="#"></td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-name"><a href="#">{{ $cart->name }}</a></p>
                                        </td>
                                        <td class="price" data-title="Price"><span>{{number_format($cart->price, 0, ",",".")}} VNĐ</span></td>
                                        <td class="qty" data-title="Qty"><!-- Input Order -->
                                            <div class="input-group">
                                                <div class="button minus">
                                                    <button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[{{ $cart->rowId }}]">
                                                        <i class="ti-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="quant[{{ $cart->rowId }}]" class="input-number" data-min="1" data-max="100" value="{{ $cart->qty }}">
                                                <div class="button plus">
                                                    <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{ $cart->rowId }}]">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!--/ End Input Order -->
                                        </td>
                                        <td class="total-amount" data-title="Total"><span>{{number_format($cart->price * $cart->qty, 0, ",",".")}} VNĐ</span></td>
                                        <td class="action" data-title="Remove"><a href="{{ route('home.cart.delete',[$cart->rowId]) }}"><i class="ti-trash remove-icon"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <button type="submit" class="btn pull-right">Cập nhật</button>
                </form>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li>Tiền : <span>{{ $cartSubTotal }} VNĐ</span></li>
                                    <li>Thuế : <span>10%</span></li>
                                    <li class="last">Tổng tiền : <span> {{ $cartTotal }} VNĐ</span></li>
                                </ul>
                                <div class="button5">
                                    <a href="{{ route('home.checkout') }}" class="btn">Thanh toán</a>
                                    <a href="{{ route('home') }}" class="btn">Mua tiếp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
@stop