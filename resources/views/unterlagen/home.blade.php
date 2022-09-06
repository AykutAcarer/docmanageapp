
<x-layout>      
        <div class="row">
            <div class="row">
                <div class="d-flex justify-content-end">
                    <div class="btn-group dropstart">
                        <button class="btn btn-sm " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                        </button>
                        <ul class="dropdown-menu border-0">
                            <div class="d-flex">
                                <a href="new" class="dropdown-item" onclick="popup(this.href, 'New Thema'); return false;"><i class="fas fa-folder-plus"></i> Thema</a>
                                <a href="#" class="dropdown-item" onclick="popup(this.href, 'My Documents'); return false;"><i class="fas fa-file"></i> My Documents</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="d-flex flex-column">
                    <div class="card overflow-auto mb-4" id="card-1" style="width: 30rem">
                        <table class="table table-sm caption-top" style="font-size: 12px">
                            <caption>List of created Documents</caption>
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Autor</th>
                                    <th scope="col">created_at</th>
                                    <th scope="col">updated_at</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($unterlagen as $unterlage)
                                <tr>
                                    <td><a href="/unterlagen/{{$unterlage->id}}" class="text-decoration-none">{{$unterlage->unterlagen_name}}</a></td>
                                    <td>{{$users->find($unterlage->user_id_fk)->name}}</td>
                                    <td>{{$unterlage->created_at}}</td>
                                    <td>{{$unterlage->updated_at}}</td>                                                                     
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card overflow-auto" id="card-2" style="width: 30rem">
                        <table class="table table-sm caption-top" style="font-size: 12px">
                            <caption>List of uploaded Documents</caption>
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">upload_by</th>
                                    <th scope="col">created_at</th>
                                    <th scope="col">Path</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($uploads as $upload)
                                <tr>
                                    <td><a href="/get/{{$upload->id}}/download" class="text-decoration-none">{{$upload->file_name}}</a></td>
                                    <td>{{$users->find($upload->user_id_fk)->name}}</td>
                                    <td>{{$upload->created_at}}</td>
                                    <td><a href="/folders/sub-folder/{{$upload->unterlagen_folders_id_fk}}" class="text-decoration-none">{{$mainfolders->find($folders->find($upload->unterlagen_folders_id_fk)->main_folder_id_fk)->main_folder_name}} / ... / {{$folders->find($upload->unterlagen_folders_id_fk)->folder_name}}</a></td>                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
</x-layout>
    


  
