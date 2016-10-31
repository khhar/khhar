<html>
    <hedad>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
    </hedad>
    <body>
    <div class='col-sm-4'></div>
    <div class="col-sm-4 admin-login-cont">
        <div class="login-form">
            {{ Form::open(['route' => 'adminLogin']) }}
                <input type="text" class="form-control input-lg" name="email" placeholder="Email" />
                <input type="password" class="form-control input-lg" name="password" placeholder="Password" />
                <div class="pwstrength_viewport_progress"></div>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
            {{ Form::close() }}
            @foreach($errors->all() as $error)
                <div class="errors">{{ $error }}</div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-4"></div>
    </body>
</html>