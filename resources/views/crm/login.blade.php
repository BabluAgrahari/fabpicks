<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap css -->
    <link href="{{asset('assets')}}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" />


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <!-- main css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 m-auto mt-5">
                <div class="card p-2">
                <h3>Login Here</h3>
                <form action="{{url('login')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter Email">
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control form-control-sm" placeholder="Enter Password">
                    </div>

                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-success btn-sm" value="Login">
                    </div>

                </form>
                </div>
            </div>
        </div>
    </div>
</body>