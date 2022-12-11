<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
</head>

<body>
    <div class="admin-form-container">
        <div class="container">
            <div class="row align-items-center g-0">
                <div class="col-md-6">
                    <div class="login-form-contianer">
                        <img src="./assets/img/logo/logo.png" class="logo" alt="Oop's No">
                        <h2 class="form-sub-title">Welcome Back</h2>
                        <h1 class="form-main-title">Register to your account</h1>
                        <div class="form-container">
                            
                            @include('crm.message')

                            <form action="{{url('register')}}" method="post" class="login-form">
                                @csrf

                                <div class="form-field">
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="Enter Name" class="input-field" required>
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-field">
                                    <input type="email" name="email" value="{{old('email')}}" placeholder="Enter your email" class="input-field" required>
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-field">
                                    <input type="password" name="password" value="{{old('password')}}" placeholder="Password" class="input-field" required>
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-field-group">
                                    <div class="form-field form-check">
                                        <input type="checkbox" class="form-check-input" id="remember">
                                        <label class="form-check-label" for="remember">Remember</label>
                                    </div>
                                    <div class="form-field">
                                        <a href="{{url('/')}}" class="forgot-link">Login?</a>
                                    </div>

                                </div>
                                <div class="form-btn-container">
                                    <button type="submit" class="login-btn">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="{{asset('assets')}}/js/main.js"></script>
</body>

</html>