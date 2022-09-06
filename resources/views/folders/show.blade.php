<x-layout>
    <div class="row">
        <div class="d-flex justify-content-between">
            <div  class="d-flex">
                <h1>{{$mainfolder->main_folder_name}}</h1>
                <a href="/home" class="ms-3"><i class="fas fa-level-up-alt fa-2x"></i></a>
            </div>
            <div class="btn-group dropstart">
                <button class="btn btn-sm " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
                <ul class="dropdown-menu border-0">
                    <div class="d-flex">
                        <a href="/{{$mainfolder->id}}/edit" class="dropdown-item" onclick="popup(this.href, 'Rename Thema'); return false;"><i class="fas fa-edit"></i> Edit</a>
                        <a href="/folders/{{$mainfolder->id}}/new" class="dropdown-item" onclick="popup(this.href, 'New Thema'); return false;"><i class="fas fa-folder-plus"></i> Folder</a>
                        <form action="/folders/{{$mainfolder->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-danger"><i class="fas fa-trash-alt fa-x"></i></button>
                        </form>
                    </div>
                </ul>
            </div>
        </div>
        <hr>
        <div class="col-10 border-end">
            <div class="d-flex flex-column mb-2">
                <div class="card me-2 mb-2 border-light w-100" id="" style="background-color: #e3f2fd;">
                    <div class="card-header">
                        Folders
                    </div>
                    <div class="card-body d-flex flex-wrap">
                        @foreach ($folders as $folder)
                            @if($folder->folder_vater_id_fk == null)
                            <a onclick="return false" ondblclick="location=this.href" href="sub-folder/{{$folder->id}}" class="text-decoration-none">
                                <div class="card me-2 border-0" style="width: 5rem; background-color: #e3f2fd;">
                                    
                                    <img class="card-img-top" src="{{asset('images/folder.png')}}" alt=""/>
                                </div> 
                                <div class="d-flex justify-content-start text-wrap" style="width: 3rem;">
                                    <p class="overflow-hidden" style="font-size: 14px">{{$folder->folder_name}}</p>
                                </div>
                            </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="">
                <h3>Information</h3>
            </div>
        </div>
    </div>
</x-layout>
