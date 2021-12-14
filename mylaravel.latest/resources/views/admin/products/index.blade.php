@extends('admin.layout.app')
@section('content')
    <div class="row">
        
        <div class="col-md-12">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Danh sách sản phẩm</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <form action="{{ route('admin.product.search')}}" method="GET">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã sản phẩm</label>
                            <input type="text" class="form-control" name="code" value="{{Request::get('code')}}" placeholder="Mã sản phẩm"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" value="{{Request::get('name')}}" placeholder="Tên sản phẩm"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" class="form-control" name="price" value="{{Request::get('price')}}" placeholder="Giá sản phẩm"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục</label>
                            <select class="form-control" name="category_id">
                                <option value="">Chọn danh mục</option>
                                @foreach($categorys as $key => $value) 
                                    <option value="{{$value->id}}" @if (Request::get('category_id') == $value->id) selected @endif>{{ $value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sản phẩm hot</label>
                            <br>
                            <input type="checkbox" name="status_hight_light" value="1" @if(Request::get('status_hight_light') == 1) checked @endif/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trạng thái</label>
                            <select class="form-control" name="status">
                                @foreach(config('constant.status_product') as $key => $value) 
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
              <h3 class="box-title">Danh sách sản phẩm</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <a href="{{route ('admin.product.add')}}" class="btn btn-primary pull-right btn-margin-bottom">Thêm sản phẩm</a>
                <br>
                <table class="table table-bordered table-responsive">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Mã code</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Sản phẩm hot</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                        @if ($products->isEmpty())
                         <tr>
                             <td colspan="9" style="text-align:center">Không có bản ghi nào hợp lệ!</td>
                         </tr>                        
                        @else
                            @php $page = Request::get('page') ? Request::get('page') : 1 @endphp
                            @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ ($key + 1) + (($page-1) * 20)}}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->number }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    @if($product->status_hight_light == 1) 
                                        <button class="btn btn-xs btn-danger">Hot</button>
                                    @else
                                    <button class="btn btn-xs btn-warning">Không</button>
                                    @endif
                                </td>
                                <td>
                                    @if($product->status == 1) 
                                        <button class="btn btn-xs btn-success">Còn hàng</button>
                                    @else
                                    <button class="btn btn-xs btn-danger">Hết hàng</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.product.edit', [$product->id])}}" class="btn btn-success">Chỉnh sửa</a>
                                    <button data-url="{{route('admin.product.delete', [$product->id])}}" class="btn btn-danger btn-delete">Xóa</button>
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
                {{ $products   ->appends(request()->query())->links() }}
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