<!--  user Update -->
<div wire:ignore.self class="modal fade modal-xl" id="updateCountryModal" tabindex="-1" aria-labelledby="updateCountryModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateCountryModal">{{$pageTitle}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['wire:submit.prevent' => 'updateCountry', 'autocomplete' => 'off', 'files' => true]) !!}
                @include('admin.config.country.form', ['btnText'=>'Actualizar'])
            {!! Form::close() !!}
        </div>
    </div>
</div>