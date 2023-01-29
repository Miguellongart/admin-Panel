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
</div>

<!-- /.card-body -->
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">{{$btnText}}</button>
    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
</div> 
