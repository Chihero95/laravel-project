<div class="products-content">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h2>Sản Phẩm</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="product-info">
                <div class="nav-main">
                    <!-- Tab Nav -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($categorys as $key => $category)
                            <li class="nav-item item-category" data-id="{{$category->id}}">
                                <a class="nav-link {{$category->id == Request::input('id') ? 'active' : ''}}" data-toggle="tab" data-id="{{$category->id}}" href="#{{$category->slug}}" role="tab">{{$category->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!--/ End Tab Nav -->
                </div>
                <div class="tab-content" id="myTabContent">
                    @foreach($categorys as $key => $category)
                    <!-- Start Single Tab -->
                    <div class="tab-pane fade show {{$key == 0 ? 'active' : ''}}" id="{{$category->slug}}" role="tabpanel">
                        <div class="tab-single">
                            <div class="row">
                                    @if($products->isEmpty())
                                        <div class="col-12">
                                            <p class="text-center" style="margin-top:10px;font-weight: bold;color:#ee4d2d">Không có sản phẩm nào</p>
                                        </div>
                                    @else
                                        @foreach($products as $prod)
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{ route('home.product.detail',[$prod->slug]) }}">
                                                            <img class="default-img" src="{{ asset('uploads/products/' . $prod->images[0]->name) }}" alt="#" style="height: 300px">
                                                            <img class="hover-img" src="{{ asset('uploads/products/' .$prod->images[0]->name) }}" style="height: 300px" alt="#">
                                                            @if($prod->status_hight_light == 1) 
                                                                <span class="out-of-stock">Hot</span> 
                                                            @else 
                                                                <span class="new" style="background-color:#2594f3">Mới</span>
                                                            @endif
                                                        </a>
                                                        <div class="button-head">
                                                            <div class="product-action">
                                                                <a data-toggle="modal" data-target="#exampleModal" title="Xem chi tiết" href=""><i class=" ti-eye"></i><span>Xem chi tiết</span></a>
                                                            </div>
                                                            <div class="product-action-2">
                                                                {{-- {{ route('home.cart.addcart.get',[$prod->id]) }} --}}
                                                                <a title="Thêm giỏ hàng" href="{{ route('home.cart.add',[$prod->id]) }}">Thêm giỏ hàng</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a href="{{ route('home.product.detail',[$prod->slug]) }}">{{$prod->name}}</a></h3>
                                                        <div class="product-price">
                                                            <span style="font-weight: bold;color:#ee4d2d">{{number_format($prod->price, 0, ",",".")}} VNĐ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                            </div>
                            {{ $products->appends(request()->query())->links() }}
                        </div>
                    </div>
                    <!--/ End Single Tab -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            getActive();
            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();
                var url = $(this).attr('href');
                window.history.pushState("", "", url);
                getData(url);
            });
            $(document).on('click', '.item-category',function(event){
                var id = $(this).attr('data-id');
                var url = '?id='+ id +'&page=1';
                window.history.pushState("", "", url);
                getData(url);
            });
            function getData(url) {
                $.ajax({
                    url : url,
                    type: "get",
                    datatype: "html"
                }).done(function(data){
                    $(".products-content").empty().html(data);
                }).fail(function(jqXHR, ajaxOptions, thrownError){
                    alert('No response from server');
                });
            }
            function getActive() {
                var url_string = window.location.href; //window.location.href
                var url = new URL(url_string);
                var id = url.searchParams.get("id");
                if(id == null) {
                    $('.item-category .nav-link:first').addClass('active');
                }
            }
        });
    </script>
</div>