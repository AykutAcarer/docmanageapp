<x-layout>
    
    <div class="row">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <h1>{{$unterlagen->unterlagen_name}}</h1>
                <a href="/folders/sub-folder/{{$unterlagen->unterlagen_folders_id_fk}}" class="ms-3"><i class="fas fa-level-up-alt fa-2x"></i></a>
            </div>
            
            <div class="d-flex">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="kapitels/new/{{$unterlagen->id}}">+ New</a>
                    <li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PDF</a>
                    <li>
                    <li class="nav-item">
                        <a class="nav-link" href="/unterlagen/{{$unterlagen->id}}/edit" onclick="popup(this.href, 'Rename Document'); return false;"><i class="fas fa-edit"></i> Edit</a>
                    <li>
                    <form action="/unterlagen/{{$unterlagen->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <li class="nav-item">
                            <button class="nav-link">Delete</button>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
        @foreach($kapitels as $kapitel)
            <div class="card mt-2">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link"><h2>{{$kapitel->unterlagen_kapitel_order}}.{{$kapitel->unterlagen_kapitel_name}}</h2></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link " href="kapitels/edit/{{$kapitel->k_id}}">Edit</a>
                        </li>
                        <form action="/unterlagen/kapitels/{{$kapitel->k_id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <li class="nav-item">
                                <button class="nav-link">Delete</button>
                            </li>
                        </form>
                    </ul>
                </div>
                <div class="card-body">
                    {!! $kapitel->unterlagen_kapitel_inhalt !!}
                    @foreach($kapitels2 as $kap)
                        @if($kap->unterlagen_kapitel_vater == $kapitel->k_id && $kap->unterlagen_id_fk == $kapitel->unterlagen_id_fk)
                            <ul class="nav nav-pills card-header-pills">
                                <li class="nav-item">
                                    <a class="nav-link"><h4>{{$kapitel->unterlagen_kapitel_order}}.{{$kap->unterlagen_kapitel_order}}.{{$kap->unterlagen_kapitel_name}}</h4></a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link " href="kapitels/edit/{{$kap->k_id}}">Edit</a>
                                </li>
                                <form action="/unterlagen/kapitels/{{$kap->k_id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <li class="nav-item">
                                        <button class="nav-link">Delete</button>
                                    </li>
                                </form>
                            </ul>
                            {!! $kap->unterlagen_kapitel_inhalt !!}
                            @foreach($kapitels2 as $kap3)
                                @if($kap3->unterlagen_kapitel_vater == $kap->k_id && $kap3->unterlagen_id_fk == $kapitel->unterlagen_id_fk)
                                    <ul class="nav nav-pills card-header-pills">
                                        <li class="nav-item">
                                            <a  class="nav-link"><h5>{{$kapitel->unterlagen_kapitel_order}}.{{$kap->unterlagen_kapitel_order}}.{{$kap3->unterlagen_kapitel_order}}.{{$kap3->unterlagen_kapitel_name}}</h5></a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link " href="kapitels/edit/{{$kap3->k_id}}">Edit</a>
                                        </li>
                                        <form action="/unterlagen/kapitels/{{$kap3->k_id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <li class="nav-item">
                                            <button class="nav-link">Delete</button>
                                            </li>
                                        </form>
                                    </ul>
                                    {!! $kap3->unterlagen_kapitel_inhalt !!}
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach 
    </div>
  
</x-layout>
