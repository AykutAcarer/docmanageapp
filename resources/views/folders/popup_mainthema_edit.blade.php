<x-popup_layout>
    <div class="card w-100 ">
        <div class="card-header">
            <h4>Rename Thema</h4>
        </div>
        <div class="card-body">
            <form action="/folders/{{$mainfolder->id}}/edit" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm" name="main_folder_name" id="main_folder_name" value="{{$mainfolder->main_folder_name}}">
                    <span><button class="form-control form-control-sm ms-2 btn btn-primary" style="width: 5rem;">Submit</button></span>
                    <input type="hidden" name="id" value="{{$mainfolder->id}}">
                </div>
            </form>
        </div>
    </div>
</x-popup_layout>      
