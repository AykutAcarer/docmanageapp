<x-layout>      
    <div class="row">
        <form action="/unterlagen/kapitels" method="POST">
            @csrf
            <div class="m-4">
                <div class="d-flex">
                
                    <div class="d-flex flex-column me-2">
                        <label for="unterlagen_name" class="form-label">Unterlage</label>
                        <input type="text" class="form-control form-control-sm" name="unterlagen_name" id="unterlagen_name" style="width: 25rem;" value="{{$unterlagen->unterlagen_name}}" readonly>
                        <input type="hidden" name="unterlagen_id_fk" value="{{$unterlagen->id}}">
                    </div>
                    
                    <div class="d-flex flex-column me-2">
                        <label for="unterlagen_kapitel_name" class="form-label">Title</label>
                        <input type="text" class="form-control form-control-sm" name="unterlagen_kapitel_name" id="unterlagen_kapitel_name" style="width: 25rem;" placeholder="title...">
                    </div>

                    <div class="d-flex flex-column me-2">
                        <label for="unterlagen_kapitel_order" class="form-label">order</label>
                        <input type="text" class="form-control form-control-sm" name="unterlagen_kapitel_order" id="unterlagen_kapitel_order" style="width: 25rem;" placeholder="order...">
                    </div>

                    <div class="d-flex flex-column">
                        <label for="unterlagen_kapitel_vater" class="form-label">Vater</label>
                        <select class="form-select form-select-sm" name="unterlagen_kapitel_vater" id="unterlagen_kapitel_vater">
                            <option value="{{NULL}}">Select...</option>
                            @foreach ($kapitels as $kapitel) 
                                {{-- @php
                                    $bereiche_selected = '';
                                    if ($_POST['unterlagen_bereich_id_fk'] == $bereiche->id) {
                                        $bereiche_selected = 'selected';
                                    }
                                @endphp --}}
                            <option value="{{$kapitel->k_id}}">{{$kapitel->unterlagen_kapitel_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-column mt-4">
                    <label for="unterlagen_kapitel_inhalt" class="form-label">Text</label>
                    <textarea name="unterlagen_kapitel_inhalt" id="unterlagen_kapitel_inhalt" cols="120" rows="10" class="form-control"></textarea>
                </div>
                <div class="d-flex justify-content-end mt-2 mb-2">
                    <button class="form-control form-control-sm ms-2" style="width: 5rem;">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <a href="/unterlagen/{{$unterlagen->id}}" class="ms-2">Back</i></a>
    </div>
</x-layout>
