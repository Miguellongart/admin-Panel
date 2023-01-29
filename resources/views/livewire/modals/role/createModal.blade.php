<!--  user Create -->
<div wire:ignore.self class="modal fade modal-xl" id="RoleModal" tabindex="-1" aria-labelledby="RoleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="RoleModal">{{$pageTitle}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['wire:submit.prevent' => 'saveRole', 'autocomplete' => 'off', 'files' => true]) !!}
                @include('admin.role.form', ['btnText'=>'Guardar'])
            {!! Form::close() !!}
        </div>
    </div>
</div>