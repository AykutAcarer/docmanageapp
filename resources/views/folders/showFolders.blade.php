<x-layout>
    <div class="row">
        <div class="d-flex justify-content-between">
            <div class="d-flex">

                <h3>{{$main->find($folder->main_folder_id_fk)->main_folder_name}} / {{$folder->folder_name}}</h3>
                
                @if($folder->folder_vater_id_fk > 10000)
                    <a href="/folders/sub-folder/{{$folder->folder_vater_id_fk}}" class="ms-3"><i class="fas fa-level-up-alt fa-2x"></i></a>
                @else 
                    <a href="/folders/{{$folder->main_folder_id_fk}}" class="ms-3"><i class="fas fa-level-up-alt fa-2x"></i></a>
                @endif
            </div>
            <div class="btn-group dropstart">
                <button class="btn btn-sm " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
                <ul class="dropdown-menu border-0">
                    <div class="d-flex">
                        <a href="{{$folder->id}}/upload" class="dropdown-item" onclick="popup(this.href, 'Upload Doc'); return false;"><i class=""></i> Upload</a>
                        <a href="{{$folder->id}}/edit" class="dropdown-item" onclick="popup(this.href, 'Rename Folder'); return false;"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{$folder->id}}/new/folder" class="dropdown-item" onclick="popup(this.href, 'New Folder'); return false;"><i class="fas fa-folder-plus"></i> Folder</a>
                        <a href="{{$folder->id}}/new/document" class="dropdown-item" onclick="popup(this.href, 'New Document'); return false;"><i class="fas fa-plus"></i> Document</a>
                        <form action="/folders/sub-folder/{{$folder->id}}" method="POST">
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
            <div class="d-flex flex-column">
                
                <div class="card me-2 mb-2 border-light w-100" id="card-1" style="background-color: #e3f2fd;">
                    <div class="card-header">
                        Folders
                    </div>
                    <div class="card-body d-flex flex-wrap" >
                        @foreach ($subfolders as $subfolder)
                        <a onclick="return false" ondblclick="location=this.href" href="{{$subfolder->id}}" class="text-decoration-none">    
                            <div class="card me-2 border-0" style="width: 3rem; background-color: #e3f2fd;">
                                <img class="card-img-top" src="{{asset('images/folder.png')}}" alt=""/>
                            </div>
                            <div class="d-flex justify-content-start text-wrap" style="width: 3rem;">
                                <p class="overflow-hidden" style="font-size: 14px">{{$subfolder->folder_name}}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            
                <div class="d-flex flex-wrap">
                    <div class="card  border-light w-50" id="card-2" style="background-color: #e3f2fd;">
                        <div class="card-header">
                            Created Documents</h4>
                        </div>
                        <div class="card-body d-flex flex-wrap">
                            @foreach ($unterlagen as $unterlage)
                            <a href="/unterlagen/{{$unterlage->id}}" class="text-decoration-none">    
                                <div class="card me-2 border-0" style="width: 3rem; background-color: #e3f2fd;">
                                    <img class="card-img-top" src="{{asset('images/no-image.png')}}" alt=""/>
                                </div>
                                <div class="d-flex justify-content-start text-wrap" style="width: 3rem;">
                                    <p class="overflow-hidden" style="font-size: 14px">{{$unterlage->unterlagen_name}}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                
                    <div class="card  border-light w-50" id="card-3" style="background-color: #e3f2fd;">
                        <div class="card-header">
                            Uploaded Documents
                        </div>
                        <div class="card-body d-flex flex-wrap">
                            @foreach ($uploads as $upload)
                            <a href="/get/{{$upload->id}}/download" class="text-decoration-none">
                                <div class="card me-2 border-0" style="width: 3rem; background-color: #e3f2fd;">
                                    <img class="card-img-top" src="{{asset('images/no-image.png')}}" alt=""/>
                                </div>
                                <div class="d-flex justify-content-start text-wrap" style="width: 3rem;">
                                    <p class="overflow-hidden text-truncate" style="font-size: 14px">{{$upload->file_name}}</p>
                                </div>
                            </a>
                            @endforeach 
                        </div>
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
