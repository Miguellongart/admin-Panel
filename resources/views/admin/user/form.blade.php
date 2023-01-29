@csrf
<div class="modal-body">
    <div class="row">
        <div class="form-group col-12 col-sm-12 col-md-6">
            {!! Form::label('name', 'Nombre:') !!} <span style="color: red">*</span>
            {!! Form::text('name', null,['wire:model' => 'name','class' =>'form-control', 'placeholder' => 'Ingresa Nombre']) !!}
            @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-12 col-sm-12 col-md-6">
            {!! Form::label('email', 'Correo:') !!} <span style="color: red">*</span>
            {!! Form::email('email', null,['wire:model' => 'email','class' =>'form-control', 'placeholder' => 'Ingresa Correo']) !!}
            @error('email')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="row mt-2">
        {!! Form::label('Title', 'Roles:') !!}
        <div class="form-group col-12 col-sm-12 col-md-6">
            @foreach($roles as $rol)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$rol->id}}" 
                    @if($roleSave)
                        @foreach ($roleSave as $item)
                            @if($rol->id === $roleSave)
                                checked
                            @endif
                        @endforeach
                    @endif
                    wire:model="roleSave">
                    <label class="form-check-label" for="flexCheckChecked">
                        {{$rol->name}}
                    </label>
                </div>
            @endforeach
            @error('roleSave')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<!-- /.card-body -->
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">{{$btnText}}</button>
    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
</div> 
