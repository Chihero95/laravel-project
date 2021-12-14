
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h2>Sản phẩm bán chạy</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="owl-carousel popular-slider">
                @foreach($productHots as $prod)
                 <!-- Start Single Product -->
                 <div class="single-product">
                    <div class="product-img">
                        <a href="{{route('home.product.detail',[$prod->slug])}}">
                            <img class="default-img" src="{{ asset('uploads/products/'.$prod->images[0]->name) }}" alt="#">
                            <img class="hover-img" src="{{ asset('uploads/products/'.$prod->images[0]->name) }}" alt="#">
                            @if($prod->status_hight_light == 1)<span class="out-of-stock">Hot</span> @else <span class="new" style="background-color: #2594f3;" >Mới</span> @endif
                        </a>
                        <div class="button-head">
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Xem chi tiết" href="#"><i class=" ti-eye"></i><span>Xem chi tiết</span></a>
                            </div>
                            <div class="product-action-2">
                                <a title="Thêm giỏ hàng" href="">Thêm giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="{{route('home.product.detail',[$prod->slug])}}">{{$prod->name}}</a></h3>
                        <div class="product-price">
                            <span style="font-weight:bold; color:#ee4d2d">{{number_format($prod->price, 0,",",".")}} VNĐ</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
                @endforeach
            </div>
        </div>
    </div>
    </div>
