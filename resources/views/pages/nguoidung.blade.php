@extends('layout.index')
@section('title')
    Thông tin cá nhân
@endsection

@section('content')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder" style="height: 600px; padding-top: 70px;">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $item)
                            {{ $item }}<br>
                            @endforeach
                        </div>
                        @endif
        
                        @if (session('thongbao'))
                        <div class="alert alert-success">
                            {{ session('thongbao') }}
                        </div>
                        @endif
				    	<form action="nguoidung" method="POST">
                            {{ csrf_field() }}
				    		<div>
				    			<label>Họ tên </label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" value="{{ $nguoidung->name }}">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" value="{{ $nguoidung->email }}"
							  	disabled
							  	>
							</div>
							<br>	
							<div>
								<input type="checkbox" id="changePassword" name="changePassword">
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled=""/>
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password" name="repassword" aria-describedby="basic-addon1" disabled=""/>
							</div>
							<br>
							<button type="submit" class="btn btn-success">Sửa
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection


@section('script')
    <script>
        $(document).ready(function()
        {
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection