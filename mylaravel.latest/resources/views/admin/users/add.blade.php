@extends('admin.layout.app')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Thêm tài khoản</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <form method="POST" action="{{ route('admin.user.create.post') }}">
        @csrf
        <div class="box-body">
            @include('includes.message')
            <div class="form-group @if($errors->has('name')) has-error @endif ">
                <label for="exampleInputEmail1">Tên tài khoản</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Tên tài khoản">
            </div>
            <div class="form-group @if($errors->has('email')) has-error @endif ">
                <label for="exampleInputEmail1">Địa chỉ email</label>
                <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Địa chỉ email">
            </div>
            <div class="form-group @if($errors->has('number_phone')) has-error @endif ">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input type="text" class="form-control" name="number_phone" value="{{old('number_phone')}}" placeholder="Vui lòng nhập số điện thoại">
            </div>
            <div class="form-group @if($errors->has('date_of_birth')) has-error @endif ">
                <label for="exampleInputEmail1">Ngày sinh</label>
                <input type="text" class="form-control" name="date_of_birth" value="{{old('date_of_birth')}}" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" placeholder="Vui lòng nhập ngày sinh">
            </div>
            <div class="form-group @if($errors->has('gender')) has-error @endif ">
                <label for="exampleInputEmail1">Giới tính</label>
                <select class="form-control" name="gender">
                @foreach(config('constant.gender') as $key => $value)
                    <option value="{{ $key }}" @if(old('gender') == $key) selected @endif>{{ $value }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group @if($errors->has('address')) has-error @endif ">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <textarea class="form-control" rows="3" name="address" placeholder="Vui lòng nhập địa chỉ">{{ old('address') }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Quyền</label>
                <select class="form-control" name="role">
                @foreach(config('constant.role') as $key => $value)
                    <option value="{{ $key }}" @if(old('role') == $key) selected @endif>{{ $value }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-primary">Thêm mới</button>
        </div>
    </form>
    <!-- /.box-body -->
  </div>
  <script>
    $(document).ready(function() {
        $('[data-mask]').inputmask();
    });
</script>
@stop