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
            {!! Form::label('description', 'Descripcion:') !!} <span style="color: red">*</span>
            {!! Form::text('description', null,['wire:model' => 'description','class' =>'form-control', 'placeholder' => 'Ingresa Nombre']) !!}
            @error('description')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-12 col-sm-12 col-md-6">
            {!! Form::label('guard_name', 'Guard:') !!} <span style="color: red">*</span>
            {!! Form::text('guard_name', null,['wire:model' => 'guard_name','class' =>'form-control', 'placeholder' => 'Ingresa Nombre']) !!}
            @error('guard_name')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

    </div>
    <div class="row mt-2">
        {!! Form::label('Title', 'Roles:') !!}
        <div class="form-group col-12 col-sm-12 col-md-6">
            @foreach($permissions as $perm)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$perm->id}}" 
                    @if($permissionsSave)
                        @foreach ($permissionsSave as $item)
                            @if($perm->id === $permissionsSave)
                                checked
                            @endif
                        @endforeach
                    @endif
                    wire:model="permissionsSave">
                    <label class="form-check-label" for="flexCheckChecked">
                        {{$perm->name}}
                    </label>
                </div>
            @endforeach
            @error('permissionsSave')
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
