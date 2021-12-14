@extends('home.layout.app')
@section('breadcrumbs')
    @include('home.includes.breadcrumbs',array("title" => $product->name, 'url' => route('home.product.detail',[$product->slug])))
@endsection
@section('content')
<div class="row no-gutters">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <!-- Product Slider -->
            <div class="product-gallery">
                <div class="quickview-slider-active owl-carousel">
                    @foreach($product->images as $key => $img)
                        <div class="single-slider">
                            <img src="{{ asset('uploads/products/' . $img->name) }}" alt="{{$product->name}}" style="width:550px">
                        </div>
                    @endforeach
                </div>
            </div>
        <!-- End Product slider -->
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="quickview-content">
            <form action="{{ route('home.cart.add',[$product->id]) }}" method="post">
                @csrf
                <h2>{{ $product->name }}</h2>
                <div class="quickview-ratting-review">
                    <div class="quickview-ratting-wrap">
                        <div class="quickview-ratting">
                            <i class="yellow fa fa-star"></i>
                            <i class="yellow fa fa-star"></i>
                            <i class="yellow fa fa-star"></i>
                            <i class="yellow fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
                <h3 style="font-weight: bold;color:#ee4d2d">{{number_format($product->price, 0, ",",".")}} VNĐ</h3>
                <p>Số lượng: <span style="font-weight: bold;color:#ee4d2d">{{$product->number}} còn lại</span></p></br>
                <div class="quickview-peragraph">
                    <p>{!! substr($product->description, 0, 200) !!}</p>
                </div>
                <div class="quantity">
                    <!-- Input Order -->
                    <div class="input-group">
                        <div class="button minus">
                            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[{{ $product->id }}]">
                                <i class="ti-minus"></i>
                            </button>
                        </div>
                        <input type="text" name="quant[{{ $product->id }}]" class="input-number"  data-min="1" data-max="1000" value="1">
                        <div class="button plus">
                            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{ $product->id }}]">
                                <i class="ti-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!--/ End Input Order -->
                </div>
                <div class="add-to-cart">
                    <button type="submit" class="btn" @if( $product->number == 0)  disabled @endif>Thêm giỏ hàng</button>
                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                </div>
                <div class="default-social">
                    <h4 class="share-now">Share:</h4>
                    <ul>
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 20px">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent" style="margin-top: -15px;border: 1px solid #eee;padding: 20px;">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                {!! $product->description !!}
            </div>
          </div>
    </div>
</div>
@stop