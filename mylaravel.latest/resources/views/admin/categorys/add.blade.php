@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm danh mục</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <form role="form" method="post" action="{{ route('auth.category.create.post') }}">
                @csrf
                <div class="box-body">
                    @include('includes.message')
                    <div class="form-group  ">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" class="form-control" value="" name="name" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Danh mục cha</label>
                        <select class="form-control" name="parent_id">
                            <option value="">Chọn danh mục cha</option>  
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>                                
                            @endforeach
                    </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
          </div>
    </div>
</div>
@stop