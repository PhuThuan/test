@extends('trangchu')
@section('content')
    <form method="post" action="user/post">
        @csrf
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
        <span class="text-danger">
            @error('username')
                {{ $message }}
            @enderror
        </span>
        <br>
        <span class="text-danger">
            @error('password')
                {{ $message }}
            @enderror
        </span>
        <br>
        <span class="text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </span>
        <br>
        </div>
        <label name='username'> Tài khoản<input type="text" name='username'></label><br>
        <label name='password'> mật khẩu<input type="text" name='password'></label><br>
        <label name='email'> email<input type="text" name='email'></label><br>
        <button type="submit">đăng nhập</button>
    </form>
@endsection
