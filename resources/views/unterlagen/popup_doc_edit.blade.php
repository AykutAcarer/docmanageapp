<x-popup_layout>
    <div class="card w-100">
        <div class="card-header">
            <h4>Rename Document</h4>
        </div>
        <div class="card-body">
            <form action="/unterlagen/{{$unterlage->id}}/edit" method="POST">
                @csrf
                @method('PUT')
                <label for="" class="form-label">Document Name</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm" name="unterlagen_name" id="unterlagen_name" value="{{$unterlage->unterlagen_name}}">
                    <span><button class="form-control form-control-sm ms-2 btn btn-primary" style="width: 5rem;" onclick="closeAndRefresh();">Submit</button></span>
                    <input type="hidden" name="unterlagen_folders_id_fk" value="{{$unterlage->unterlagen_folders_id_fk}}">
                </div>
            </form>
        </div>
    </div>
</x-popup_layout>      
