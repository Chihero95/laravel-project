@extends('admin.layout.app')
@section('content')
<ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    Thông tin đơn hàng
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            @foreach($orderDetail as $detail)
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                {{--<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>--}};

                <h3 class="timeline-header">
                     <a hrf="#">
                         Thông tin sản phẩm: {{$detail['products_code']}} - {{$detail['products_name']}} -
                         @if($detail['status'] == 1)
                         <button class="btn btn-xs btn-warning">{{config('constant.status_order')[$detail['status']]}}</button>
                         @else
                         <button class="btn btn-xs btn-success">{{config('constant.status_order')[$detail['status']]}}</button>
                         @endif
                    </a>
                </h3>

                <div class="timeline-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="box-default">
                                <div class="box-header">

                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Họ tên</label><br>
                                        <span>{{$detail['name']}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ email</label><br>
                                        <span>{{$detail['email']}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label><br>
                                        <span>{{$detail['phone']}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ</label><br>
                                        <span>{{$detail['address']}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Ghi chú</label><br>
                                        <span>{{$detail['note']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="box-default">
                                <div class="box-header">
                                    <h3 class="box-title">Thông tin sản phẩm</h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label><br>
                                        <span>{{$detail['products_name']}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục</label><br>
                                        <span>{{$detail['categorys_name']}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Số lượng mua</label><br>
                                        <span>{{$detail['pay_qty']}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá tiền</label><br>
                                        <span>{{number_format($detail['pay_price'])}} VNĐ</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Tổng tiền</label><br>
                                        <span>{{number_format($detail['pay_subtotal'])}}</span>
                                    </div>
                                </div>                            
                        </div>
                    </div>
                </div>
              </div>
            </li>
            @endforeach
          </ul>

@stop