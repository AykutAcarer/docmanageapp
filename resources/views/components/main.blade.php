<div class="col-10">
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
                                    <form class="inline dropdown-item" method="POST" action="logout">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Logout</i>
                                    </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="row">
            <div class="d-flex justify-content-end">
                <div class="btn-group dropstart">
                    <button class="btn btn-sm " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu border-0">
                        <div class="d-flex">
                            <a href="/new" class="dropdown-item" onclick="popup(this.href, 'New Thema'); return false;"><i class="fas fa-folder-plus"></i> Thema</a>
                            <a href="#" class="dropdown-item" onclick="popup(this.href, 'My Documents'); return false;"><i class="fas fa-file"></i> My Documents</a>
                        </div>
                    </ul>
                </div>
            </div>
        </div> 
        <div class="row">
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Aktiv</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($unterlagen as $unterlage)
                        <tr>
                            <td><a href="/unterlagen/{{$unterlage->id}}">{{$unterlage->unterlagen_name}}</a></td>
                            <td>{{$unterlage->unterlagen_aktiv}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>
