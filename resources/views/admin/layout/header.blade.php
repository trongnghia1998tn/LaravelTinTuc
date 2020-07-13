<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">Admin</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown" >
            <a class="dropdown-toggle" data-toggle="dropdown" style="min-width: 200px; padding-left: 20px;">
                <i class="fa fa-user fa-fw"></i>
                @if (Auth::check())
                    {{ Auth::user()->name }}
                @endif
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user" style="min-width: 200px">
                @if (Auth::check())
                    {{-- <li style="padding: 3px 20px; min-height: 0;"><i class="fa fa-user fa-fw"></i>  {{ Auth::user()->name }}</li>
                    <li class="divider"></li> --}}
                    <li><a href="admin/user/sua/{{ Auth::user()->id }}"><i class="fa fa-gear fa-fw"></i> Sửa thông tin</a></li>
                    <li class="divider"></li>
                    <li><a href="admin/dangxuat"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                    </li>
                @endif
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>

    @include('admin.layout.menu')
    <!-- /.navbar-static-side -->
</nav>