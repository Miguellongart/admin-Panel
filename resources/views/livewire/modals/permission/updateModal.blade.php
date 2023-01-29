<!--  user Update -->
<div wire:ignore.self class="modal fade modal-xl" id="updatepermissionModal" tabindex="-1" aria-labelledby="updatepermissionModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updatepermissionModal">{{$pageTitle}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['wire:submit.prevent' => 'updatePermission', 'autocomplete' => 'off', 'files' => true]) !!}
                @include('admin.permission.form', ['btnText'=>'Actualizar'])
            {!! Form::close() !!}
        </div>
    </div>
</div>