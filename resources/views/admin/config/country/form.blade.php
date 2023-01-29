@csrf
<div class="modal-body">
    <div class="row">
        <div class="form-group col-12 col-sm-12 col-md-6">
            {!! Form::label('name', 'Name:') !!} <span style="color: red">*</span>
            {!! Form::text('name', null,['wire:model' => 'name','class' =>'form-control', 'placeholder' => 'Ingresa Nombre']) !!}
            @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-12 col-sm-12 col-md-6">
            {!! Form::label('nombre', 'Nombre:') !!} <span style="color: red">*</span>
            {!! Form::text('nombre', null,['wire:model' => 'nombre','class' =>'form-control', 'placeholder' => 'Ingresa Nombre']) !!}
            @error('nombre')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-12 col-sm-12 col-md-6">
            {!! Form::label('nom', 'Nom:') !!} <span style="color: red">*</span>
            {!! Form::text('nom', null,['wire:model' => 'nom','class' =>'form-control', 'placeholder' => 'Ingresa Nombre']) !!}
            @error('nom')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-12 col-sm-12 col-md-6">
            {!! Form::label('iso2', 'Iso 2:') !!} <span style="color: red">*</span>
            {!! Form::text('iso2', null,['wire:model' => 'iso2','class' =>'form-control', 'placeholder' => 'Ingresa Nombre']) !!}
            @error('iso2')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-12 col-sm-12 col-md-6">
            {!! Form::label('iso3', 'Iso 3:') !!} <span style="color: red">*</span>
            {!! Form::text('iso3', null,['wire:model' => 'iso3','class' =>'form-control', 'placeholder' => 'Ingresa Nombre']) !!}
            @error('iso3')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-12 col-sm-12 col-md-6">
            {!! Form::label('phone_code', 'Codigo Telefono:') !!} <span style="color: red">*</span>
            {!! Form::text('phone_code', null,['wire:model' => 'phone_code','class' =>'form-control', 'placeholder' => 'Ingresa Nombre']) !!}
            @error('phone_code')
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
