<x-popup_layout>
    @php
        $id = auth()->user()->id;
    @endphp
    <div class="card w-100">
        <div class="card-header">
            <h4>New Folder</h4>
        </div>
        <div class="card-body">
            <form action="/folders/sub-folder/{{$folder->id}}" method="POST">
                @csrf
                <label for="" class="form-label">New Document</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm" name="unterlagen_name" id="unterlagen_name">
                    <span><button class="form-control form-control-sm ms-2 btn btn-primary" name="form_document" style="width: 5rem;" onclick="closeAndRefresh();">Submit</button></span>
                    <input type="hidden" name="unterlagen_folders_id_fk" value="{{$folder->id}}">
                    <input type="hidden" name="user_id_fk" value="'{{$id}}">
                </div>
            </form>
        </div>
    </div>
</x-popup_layout>      
