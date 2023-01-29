<!--  user Create -->
<div wire:ignore.self class="modal fade modal-xl" id="permissionModal" tabindex="-1" aria-labelledby="permissionModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="permissionModal">{{$pageTitle}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['wire:submit.prevent' => 'savePermission', 'autocomplete' => 'off', 'files' => true]) !!}
                @include('admin.permission.form', ['btnText'=>'Guardar'])
            {!! Form::close() !!}
        </div>
    </div>
</div>