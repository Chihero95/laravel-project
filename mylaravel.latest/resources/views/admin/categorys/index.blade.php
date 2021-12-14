@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Danh sách danh mục</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="{{ route('auth.category.create') }}" class="btn btn-primary pull-right btn-margin-bottom">Thêm danh mục</a>
                    </br>
                    <table class="table table-bordered">
                        <tbody><tr>
                          <th>#</th>
                          <th>Tên danh mục</th>
                          <th>Slug</th>
                          <th>Danh mục cha</th>
                          <th>Ngày tạo</th>
                          <th></th>
                        </tr>
                        @if($category->isEmpty())
                          <tr><td colspan="6" style="text-align:center">Không có bản ghi nào</td><tr>
                        @else 
                          @foreach($category as $key => $item)
                            <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $item->name }}</td>
                              <td>
                                {{ $item->slug }}
                              </td>
                              <td>
                                @if($item->parent != null)
                                  {{ $item->parent()->first()['name'] }}
                                @endif
                              </td>
                              <td>{{ $item->created_at }}</td>
                              <td>
                                <a href="{{ route('auth.category.detail', [$item->id]) }}" class="btn btn-success">Chỉnh sửa</a>
                                <button data-url="{{ route('auth.category.delete', [$item->id]) }}" class="btn btn-danger btn-delete">Xóa</button>
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody></table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pull-right">
                      {{ $category->links() }}
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