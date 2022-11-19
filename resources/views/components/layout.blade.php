<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    
    <!--Froala Editor-->
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0ba0b67143.js" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- Import jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <!-- Import Ajax/Jquery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
         @media (max-width: 768px) { 
            #side{
                height: unset !important;
            }

            #navbar{
                display: flex !important;
                flex-direction: column-reverse !important;
                
            }

            #user-bar{
                display: flex !important;
                flex-direction: row !important;
                width: 100% !important;
                justify-content: space-between!important;
                
            }
            #search-bar{
                width: 100% !important;
                
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid" >
        <div class="row bg-light">
            <div class="col-md-3 col-lg-2 col-xl-2 col-xxl-2" style="background-color: #e3f2fd; height:100vh;" id="side">
                
                <div class="offcanvas-md offcanvas-start d-flex flex-column align-items-center" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" style="background-color: #e3f2fd; height:auto;" >
                    
                    <a href="/home" class="text-decoration-none">
                        <img src="/images/no-image.png" alt="100" width="100" height="" class="rounded-circle img-fluid">
                    </a>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button> --}}
                    
                    <div class="offcanvas-body ">
                        <ul class="navbar-nav d-flex flex-column">
                            <li class="nav-item">
                                <a href="/home" class="nav-link align-middle px-0">
                                    <i class="fs-4"></i> <span class="ms-1">Home</span>
                                </a>
                            </li>
                            @foreach($main as $mainfolders)
                            <li class="nav-item">    
                                <a href="/folders/{{$mainfolders->id}}" class="nav-link px-0"> {{$mainfolders->main_folder_name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row">
                    <nav class="navbar navbar-expand-md ms-1" style="background-color: #e3f2fd;" >
                        <div class="container-fluid" id="navbar">
                            <div id="search-bar">
                                <form class="d-flex" role="search">
                                    <input class="form-control form-control-sm me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-sm btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                            <div id="user-bar">
                                <div>
                                    <button class="btn btn-sm btn-primary d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">Menu</button>
                                </div>
                                <div>
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        
                                        <li class="nav-item dropdown dropstart">
            
                                            <img src="/images/no-image.png" alt="" width="35" height="35" class="nav-link dropdown-toggle rounded-circle border " id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li>
                                                    <p class="dropdown-item">{{auth()->user()->name}}</p>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                                <li>
                                                    <form class="inline dropdown-item" method="POST" action="/logout">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger">Logout</i>
                                                    </form>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                {{$slot}}
            </div>    
        </div>
    </div>


    <script type="text/javascript">
        var windowObjectReference = null; // global variable

        function popup(url, windowName) {
            if (windowObjectReference == null || windowObjectReference.closed) {
                windowObjectReference = window.open(url, windowName, "location=no,directories=0, menubar=no,scrollbars=no,status=yes,toolbar=no,dependent=yes,left=380,top=120,width=" + (screen.availWidth - 740) + ",height=" + (screen.availHeight - 600) + "");
                
            } else {
                windowObjectReference.focus();
            };
        }

    </script>

    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>  
    <script> 
        var editor = new FroalaEditor('#unterlagen_kapitel_inhalt');
    </script>

</body>

</html>
