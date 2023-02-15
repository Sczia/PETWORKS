<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="/css/log.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/petworks.png') }}">
    <title>Login</title>
</head>

<body>
    <section class="side">
        <img src="{{ asset('images/petworks.png') }}" alt="">
    </section>
    <section class="main">
        <div class="login-container">
            <p class="title">Welcome back</p>
            <div class="separator"></div>
            <p class="welcome-message">Please, provide login credential to proceed and have access to all our services
            </p>

            <form class="login-form" action="{{ route('admin.user.login') }}" method="post">
                @csrf

                <div class="form-control">
                    <input type="text" placeholder="Username" name="email"
                        class="@error('email') is-invalid @enderror">
                    <i class="fas fa-user"></i>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-control">
                    <input type="password" placeholder="Password" name="password">
                    <i class="fas fa-lock"></i>
                </div>

                <button class="submit">Login</button>
            </form>
        </div>
    </section>

</body>

</html>
