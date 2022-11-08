<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0ba0b67143.js" crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <style>
        
        @media (min-width: 576px) { 
            main{
                height: 85vh;
            }
        }

        @media (max-width: 576px) { 
            main{
                height: 85vh;
            }
           
        }

    </style>

</head>
<body>
    <div class="col-sm col-md col-lg col-xl col-xxl">
        <nav class="row navbar bg-light" >
            <div class="container-fluid">
                <a href=""><img src="/images/no-image.png" alt="" width="50" height="50" class="navbar-brand rounded-circle img-fluid"/></a>
                <div class="">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <p>This website is under construction!!!</p>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Documentation</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="row">
            <div class="d-flex justify-content-center p-4" style="background-color: #e3f2fd;">   
                <div class="card border-0 p-4 m-4" style="background-color: transparent">
                    <div class="card-header border-0" style="background-color: transparent">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body border-top border-bottom">
                        <form action="/users/authenticate" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="email" class="form-label"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    class="form-control form-control-sm"
                                    name="email"
                                    value="{{old('email')}}"
                                />
                                @error('email')
                                    <p class="text-danger fs-6 mt-1">{{$message}}</p>
                                @enderror
                                
                            </div>
            
                            <div class="mb-2">
                                <label for="password" class="form-label"
                                    >Password</label
                                >
                                <input
                                    type="password"
                                    class="form-control form-control-sm"
                                    name="password"
                                    value="{{old('password')}}"
                                />
                                @error('password')
                                <p class="text-danger fs-6 mt-1">{{$message}}</p>
                                @enderror
                                
                            </div>
            
                            <div class="d-flex justify-content-end mb-2">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-sm"
                                >
                                    Sign in
                                </button>
                            </div>
        
                        </form>

                    </div>

                    <div class="card-footer border-0 m-3" style="background-color: transparent">
                        <div class="mt-1">
                            <p>
                                Do not have an account?
                                <a href="/" class=""
                                    >Register</a
                                >
                            </p>
                        </div>
                    </div>

                </div>      
            </div>
        </main>
        <footer class="row bg-light">
            <div class="d-flex justify-content-center">
                <p class="p-2 " style="font-size: 12px">Copyright © 2022</p>
            </div>
        </footer>
    </div>
</body>
</html>
