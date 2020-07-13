<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{-- <a class="navbar-brand" href="trangchu"><span class="fa fa-home"> </span> Trang chủ</a> --}}
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="headertintuc">
            {{-- <ul class="nav navbar-nav">
                <li>
                    <a href="lienhe">Liên hệ</a>
                </li>
            </ul> --}}
            <form class="navbar-form navbar-left" role="search" action="timkiem" method="GET">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm" name="tukhoa">
                </div>
                <button type="submit" class="btn btn-default"><span class="fa fa-search"></span></button>
            </form>
            <ul class="root">
                <li style="width: 120px;"><a href="trangchu">Trang chủ</a></li>
                <li><a href="lienhe">Liên hệ</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                @if (Auth::check())
                <li>
                    <a href="nguoidung">
                        <span class="fa fa-user-o"></span>
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li>
                    <a href="dangxuat">
                        <span class="fa fa-sign-out"></span>
                        Đăng xuất
                    </a>
                </li>
                @else
                <li>
                    <a href="dangky">
                        <span class="fa fa-user-plus"></span>
                        Đăng ký
                    </a>
                </li>
                <li>
                    <a href="dangnhap">
                        <span class="fa fa-sign-in"></span>
                        Đăng nhập
                    </a>
                </li>
                @endif
            </ul>
        </div>
        


        <!-- /.navbar-collapse -->
    </div>
</nav>