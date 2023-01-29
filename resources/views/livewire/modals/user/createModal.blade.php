<!--  user Create -->
<div wire:ignore.self class="modal fade modal-xl" id="userModal" tabindex="-1" aria-labelledby="userModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="userModal">{{$pageTitle}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['wire:submit.prevent' => 'saveUser', 'autocomplete' => 'off', 'files' => true]) !!}
                @include('admin.user.form', ['btnText'=>'Guardar'])
            {!! Form::close() !!}
        </div>
    </div>
</div>