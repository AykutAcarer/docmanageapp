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

</head>
<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center mt-4">   
                <div class="card w-25">
                    <div class="card-header">
                        <h3>Register</h3>
                        <p class="mb-4">Create an account</p>
                    </div>
                    <div class="card-body">
                        <form action="/users" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    Name
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="{{old('name')}}"
                                />
                                @error('name')
                                <p class="text-danger fs-6 mt-1">{{$message}}</p>
                                @enderror
                            </div>
            
                            <div class="mb-3">
                                <label for="email" class="form-label"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    value="{{old('email')}}"
                                />
                                @error('email')
                                <p class="text-danger fs-6 mt-1">{{$message}}</p>
                                @enderror
                                
                            </div>
            
                            <div class="mb-3">
                                <label for="password" class="form-label"
                                    >Password</label
                                >
                                <input
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    value="{{old('password')}}"
                                />
                                @error('password')
                                <p class="text-danger fs-6 mt-1">{{$message}}</p>
                                @enderror
                                
                            </div>
                            <div class="mb-3">
                                <label
                                    for="password_confirmation"
                                    class="form-label"
                                >
                                    Confirm Password
                                </label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                />
                                @error('password_confirmation')
                                <p class="text-danger fs-6 mt-1">{{$message}}</p>
                                @enderror
                            </div>
            
                            <div class="d-flex justify-content-end mb-3">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-sm"
                                >
                                    Sign Up
                                </button>
                            </div>
        
                        </form>

                    </div>

                    <div class="card-footer">
                        <div class="mt-8">
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
</body>
</html>
