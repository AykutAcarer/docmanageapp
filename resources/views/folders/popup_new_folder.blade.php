<x-popup_layout>
    <div class="card w-100">
        <div class="card-header">
            <h4>New Folder</h4>
        </div>
        <div class="card-body">
            <form action="/folders/sub-folder/{{$folder->id}}/new/folder" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm" name="folder_name" id="folder_name">
                    <span><button class="form-control form-control-sm ms-2 btn btn-primary" style="width: 5rem;" onclick="closeAndRefresh();">Submit</button></span>
                    <input type="hidden" name="main_folder_id_fk" value="{{$folder->main_folder_id_fk}}">
                    <input type="hidden" name="folder_vater_id_fk" value="{{$folder->id}}">
                </div>
            </form>
        </div>
    </div>
</x-popup_layout>      
