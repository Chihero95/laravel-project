@extends('home.layout.app')
@section('breadcrumbs')
    @include('home.includes.breadcrumbs',array("title" => "Đăng kí tài khoản", 'url' => route('home.register')))
@endsection
@section('content')
<div class="products-content contact-us">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-main">
                <div class="section-title">
                    <h2>Đăng kí</h2>
                </div>
                @include('includes.message')
                <form action="{{route('home.register.post')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên tài khoản</label>
                        <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Tên tài khoản">
                    </div>
                    <div class="form-group">
                    <label>Địa chỉ email</label>
                    <input type="text" class="form-control" value="{{old('email')}}" placeholder="Địa chỉ email" name="email">
                    </div>
                    <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" value="{{old('number_phone')}}" name="number_phone" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="text" class="form-control input-datepicker" value="{{old('date_of_birth')}}" name="date_of_birth" placeholder="Ngày sinh">
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        </br>
                        <input type="radio" name="gender" value="1" checked> Nam
                        <input type="radio" name="gender" value="2"> Nữ
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                    <textarea class="form-control" name="address">{{old('address')}}</textarea>
                    </div>
                    <button type="submit" class="btn">Đăng kí</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.input-datepicker').datepicker({
            format: "dd-mm-yyyy",
        });
    });
</script>
@stop