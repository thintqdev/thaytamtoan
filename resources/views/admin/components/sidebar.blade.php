<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('user') }}" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>Quản lý học sinh</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('group') }}" class='sidebar-link'>
                        <i class="bi bi-briefcase"></i>
                        <span>Quản lý lớp học</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('document') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Quản lý tài liệu</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('exam') }}" class='sidebar-link'>
                        <i class="bi bi-vector-pen"></i>
                        <span>Quản lý đề thi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('notification') }}" class='sidebar-link'>
                        <i class="bi bi-bell"></i>
                        <span>Quản lý thông báo</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('news') }}" class='sidebar-link'>
                        <i class="bi bi-newspaper"></i>
                        <span>Quản lý tin tức</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('category') }}" class='sidebar-link'>
                        <i class="bi bi-card-list"></i>
                        <span>Quản lý danh mục</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('quote') }}" class='sidebar-link'>
                        <i class="bi bi-blockquote-left"></i>
                        <span>Quản lý trích dẫn</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-door-open"></i>
                        <span>Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
