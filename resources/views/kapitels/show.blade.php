<x-layout>
    
    <div class="row">
        <form action="/unterlagen/kapitels/{{$kapitels->k_id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="m-4">
                
                <div class="d-flex">
                
                    <div class="d-flex flex-column me-2">
                        <label for="unterlagen_name" class="form-label">Unterlage</label>
                        @foreach($unterlagen as $unterlage)
                        <input type="text" class="form-control form-control-sm" name="unterlagen_name" id="unterlagen_name" style="width: 25rem;" value="{{$unterlage->unterlagen_name}}" readonly>
                        <input type="hidden" name="unterlagen_id_fk" value="{{$unterlage->id}}">
                        @endforeach
                    </div>
                    
                    <div class="d-flex flex-column me-2">
                        <label for="unterlagen_kapitel_name" class="form-label">Title</label>
                        <input type="text" class="form-control form-control-sm" name="unterlagen_kapitel_name" id="unterlagen_kapitel_name" style="width: 25rem;" value="{{$kapitels->unterlagen_kapitel_name}}">
                        <input type="hidden" name="unterlagen_kapitel_id" value="{{$kapitels->k_id}}">
                    </div>

                    <div class="d-flex flex-column me-2">
                        <label for="unterlagen_kapitel_order" class="form-label">order</label>
                        <input type="text" class="form-control form-control-sm" name="unterlagen_kapitel_order" id="unterlagen_kapitel_order" style="width: 25rem;" value="{{$kapitels->unterlagen_kapitel_order}}">
                    </div>

                    <div class="d-flex flex-column">
                        <label for="unterlagen_kapitel_vater" class="form-label">Vater</label>
                        @if($kapitels->unterlagen_kapitel_vater != Null)
                            @foreach($selectedKapitel as $kapitel)
                            <input type="text" class="form-control form-control-sm" name="unterlagen_kapitel_vater_name" id="unterlagen_kapitel_vater_name" style="width: 25rem;" value="{{$kapitel->unterlagen_kapitel_name}}" readonly>
                            <input type="hidden" name="unterlagen_kapitel_vater" value="{{$kapitel->k_id}}">
                            @endforeach
                        @else
                            @foreach($unterlagen as $unterlage)
                            <input type="text" class="form-control form-control-sm" name="unterlagen_kapitel_vater_name" id="unterlagen_kapitel_vater_name" style="width: 25rem;" value="{{$unterlage->unterlagen_name}}" readonly>
                            <input type="hidden" name="unterlagen_kapitel_vater" value="{{NULL}}">
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="d-flex flex-column mt-4">
                    <label for="unterlagen_kapitel_inhalt" class="form-label">Text</label>
                    <textarea name="unterlagen_kapitel_inhalt" id="unterlagen_kapitel_inhalt" cols="120" rows="10" class="form-control">{{$kapitels->unterlagen_kapitel_inhalt}}</textarea>
                </div>
                <div class="d-flex justify-content-end mt-2 mb-2">
                    <button class="form-control form-control-sm ms-2" style="width: 5rem;">Submit</button>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-start">
            <a href="/unterlagen/{{$unterlage->id}}" class="btn btn-sm btn-primary">Back</a>
        </div>
    </div>
    
</x-layout>      
