<x-popup_layout>
    <div class="card w-100">
        <div class="card-header">
            <h4>Upload File</h4>
        </div>
        <div class="card-body">
            <form action="/folders/sub-folder/{{$folder->id}}/upload" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control form-control-sm" name="file_name" id="file_name">
                    <span><button class="form-control form-control-sm ms-2 btn btn-primary" style="width: 5rem;" onclick="closeAndRefresh();">Submit</button></span>
                    <input type="hidden" name="unterlagen_folders_id_fk" value="{{$folder->id}}">
                </div>
            </form>
        </div>
    </div>
</x-popup_layout>       
