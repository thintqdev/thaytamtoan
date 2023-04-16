<!DOCTYPE html>
<html>

<head>
    <title>Thầy Tâm toán | Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin/auth/style.css') }}">
</head>

<body>
    <div class="form">
        <h2>Đăng nhập hệ thống</h2>
        <form action="{{ route('admin.login') }}" method="post" autofocus>
            @csrf
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</body>

</html>
