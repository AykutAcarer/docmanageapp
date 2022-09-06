<x-popup_layout>
    <div class="card w-100">
        <div class="card-header">
            <h4>Rename Folder</h4>
        </div>
        <div class="card-body">
            <form action="/folders/sub-folder/{{$folder->id}}/edit" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm" name="folder_name" id="folder_name" value="{{$folder->folder_name}}">
                    <span><button class="form-control form-control-sm ms-2 btn btn-primary" style="width: 5rem;" onclick="closeAndRefresh();">Submit</button></span>
                    <input type="hidden" name="id" value="{{$folder->id}}">
                </div>
            </form>
        </div>
    </div>
</x-popup_layout>      
