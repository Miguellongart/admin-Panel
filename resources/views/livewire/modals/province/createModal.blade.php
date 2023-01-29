<!--  user Create -->
<div wire:ignore.self class="modal fade modal-xl" id="provinceModal" tabindex="-1" aria-labelledby="provinceModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="provinceModal">{{$pageTitle}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['wire:submit.prevent' => 'saveCountry', 'autocomplete' => 'off', 'files' => true]) !!}
                @include('admin.config.province.form', ['btnText'=>'cargar'])
            {!! Form::close() !!}
        </div>
    </div>
</div>