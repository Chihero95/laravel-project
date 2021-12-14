@extends('home.layout.app')
@section('breadcrumbs')
    @include('home.includes.breadcrumbs',array("title" => "Đăng nhập", 'url' => route('home.login')))
@endsection
@section('content')
<div class="products-content contact-us">
    <div class="row">
        <div class="col-sm-12">
          <div class="form-main">
              <div class="section-title">
                <h2>Đăng nhập</h2>
              </div>
              @include('includes.message')
              <form action="{{route('home.login.post')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Địa chỉ email</label>
                    <input type="text" class="form-control" placeholder="Địa chỉ email" name="email">
                  </div>
                  <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                  </div>
                  <div class="form-group">
                    <input type="checkbox" name="remember" class="form-check-input">
                    <label class="form-check-label">Ghi nhớ</label>
                  </div>
                  <button type="submit" class="btn">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop