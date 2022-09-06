<div class="row">
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid d-flex justify-content-between">
            <div>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <p class="nav-link">Welcome {{auth()->user()->name}}</p>
                    </li>

                    <li class="nav-item dropdown dropstart">

                        <img src="/images/no-image.png" alt="" width="50" height="50" class="nav-link dropdown-toggle rounded-circle border " id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <form class="inline dropdown-item" method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Logout</i>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
