<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0ba0b67143.js" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital@1&display=swap" rel="stylesheet">

    <style>
        @media (max-width: 768px) { 

            main{
                display: flexbox;
                flex-direction: column;
            }

            .div1{
            
                padding-top: 350px;
            }

            .div2{
            
            margin-top: 5px;
        }

        }

        @media (min-width: 768px) { 
            main{
               height: 85vh;
               width:100vw;             }
        }

    </style>
</head>

<body>
    <div class="col col-sm col-md col-lg col-xl col-xxl">
        <nav class="row navbar bg-light" >
            <div class="container-fluid">
                <a href=""><img src="/images/no-image.png" alt="" width="50" height="50" class="navbar-brand rounded-circle img-fluid"></a>
                <p class="fs-3 font-monospace text-muted">This website is under construction!!!</p>
                <div class="">
                    <ul class="nav justify-content-end">
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
            <div class="col-md-8 col-lg-8 col-xl-9 col-xxl-9 position-relative div1"  style="background-color: #e3f2fd;">
                <div class="card border-0  position-absolute top-50 start-50 translate-middle w-75" style="background-color: transparent">
                    <div class="card-header border-0" style="background-color: transparent">
                        <h2 class=" fw-bold text-primary" style="font-family: 'Source Sans Pro', sans-serif;">CM Docs v.1.0.0</h2>
                    </div>
                    <div class="card-body">
                        <h5 class="text-muted" style="font-family: 'Source Sans Pro', sans-serif;">Create & Management Documents</h5>
                        <p style="font-family: 'Source Sans Pro', sans-serif;">A document management system (DMS) is a system used to receive, track, manage and store documents and reduce paper.</p> 
                        <p style="font-family: 'Source Sans Pro', sans-serif;">Most are capable of keeping a record of the various versions created and modified by different users.</p> 
                        <a href="/" class="btn  bg-primary text-white">Demo</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-3 col-xxl-3 border-start div2" style="background-color: #e3f2fd;">
                <div class="d-flex justify-content-center ps-4 mt-4">   
                    <div class="card border-0 " style="background-color: transparent">
                        <div class="card-header border-0" style="background-color: transparent">
                            <h4>Registeration</h4>
                            <p class="mb-2">Create an account</p>
                        </div>
                        <div class="card-body">
                            <form action="/users" method="post">
                                @csrf
                                <div class="mb-2">
                                    <label for="name" class="form-label">
                                        Name
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control form-control-sm"
                                        name="name"
                                        value="{{old('name')}}"
                                    />
                                    @error('name')
                                    <p class="text-danger fs-6 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                
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
                                <div class="mb-2">
                                    <label
                                        for="password_confirmation"
                                        class="form-label"
                                    >
                                        Confirm Password
                                    </label>
                                    <input
                                        type="password"
                                        class="form-control form-control-sm"
                                        name="password_confirmation"
                                    />
                                    @error('password_confirmation')
                                    <p class="text-danger fs-6 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                
                                <div class="d-flex justify-content-end m2-3">
                                    <button
                                        type="submit"
                                        class="btn btn-primary btn-sm"
                                    >
                                        Sign Up
                                    </button>
                                </div>
            
                            </form>
    
                        </div>
                        <div class="card-footer" style="background-color: transparent">
                            <div class="mt-1">
                                <p>
                                    Already have an account?
                                    <a href="/login" class=""
                                        >Login</a
                                    >
                                </p>
                            </div>
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


