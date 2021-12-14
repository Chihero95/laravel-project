@extends('admin.layout.app')
@section('content')
    <div class="row">
        
        <div class="col-md-12">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tìm kiếm</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <form action="{{ route('admin.order.search')}}" method="GET">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã đơn hàng</label>
                            <input type="text" class="form-control" name="code" value="{{Request::get('code')}}" placeholder="Mã đơn hàng"/>
                        </div>
                    </div>                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trạng thái</label>
                            <select class="form-control" name="status">
                                @foreach(config('constant.status_order') as $key => $value) 
                                    <option value="{{$key}}" @if (Request::get('status') == $key) selected @endif>{{ $value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Tìm kiếm</button>
            </div>
            </form>
          </div>
        </div>
        <div class="col-md-12">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Danh sách đơn hàng</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-responsive">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Mã code</th>
                            <th>Trạng thái</th>
                            <th>Ngày mua</th>
                            <th></th>
                        </tr>
                        @if ($orders->isEmpty())
                         <tr>
                             <td colspan="9" style="text-align:center">Không có bản ghi nào!</td>
                         </tr>                        
                        @else
                            @php $page = Request::get('page') ? Request::get('page') : 1 @endphp
                            @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ ($key + 1) + (($page-1) * 20)}}</td>
                                <td><a href="{{route('admin.order.detail', [$order->id])}}">{{ $order->code }}</a></td>
                                <td>
                                    @if($order->status == 1)
                                        <button class="btn btn-xs btn-warning">{{config('constant.status_order')[$order->status]}}</button>
                                    @else
                                    <button class="btn btn-xs btn-success">{{config('constant.status_order')[$order->status]}}</button>
                                    @endif
                                </td>
                                <td>{{ $order->created_at }}</td>                                
                                <td>
                                    @if($order->status == 1)
                                    <a href="{{route('admin.order.confirm',[$order->id])}}" class="btn btn-success">Xác nhận</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>

                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="pull-right">
                {{ $orders->appends(request()->query())->links() }}
                </div>
            </div>
          </div>
        </div>
    </div>
    <script>
      $(document).ready(function(){
        $('.btn-delete').click(function(){
          $('.modal-confirm').modal({
            show: true
          });
          $('#form-confirm').attr('action',$(this).attr('data-url'));
        });
        }); 
      </script>
@stop