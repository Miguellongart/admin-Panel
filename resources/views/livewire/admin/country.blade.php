<div>
    <div class="card">
        <div class="card-head">
            <div class="d-flex justify-content-between">
                @include('common.searchBox')
                {{-- @can('user.create')
                    <div class="p-2">
                        <button type="button" class="btn btn-sm btn-success" wire:click="saveCountry()" data-placement="top" title="Agregar">
                            <i class="fa-solid fa-square-plus"></i>
                        </button>
                    </div>
                @endcan --}}
            </div>
        </div>
        <div class="card-body">
            @if (count($rows))
            <div class="table-responsive-md">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">nombre</th>
                            <th scope="col">iso2</th>
                            <th scope="col">iso3</th>
                            <th scope="col">phone_code</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->nombre}}</td>
                                <td>{{$row->iso2}}</td>
                                <td>{{$row->iso3}}</td>
                                <td>{{$row->phone_code}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-warning" wire:click="viewProvince({{ $row->id }})" data-placement="top" title="Ver Provincia" data-bs-toggle="modal" data-bs-target="#viewCountryModal">
                                            <i class="fa-solid fa-share"></i>
                                        </button>
                                        @can('user.edit')
                                        <button type="button" class="btn btn-sm btn-info" wire:click="editCountry({{ $row->id }})" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#updateCountryModal">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        @endcan
                                        {{-- @can('user.delete')
                                        <button type="button" class="btn btn-sm btn-danger" wire:click="$emit('deleteElement', {{ $row->id }})" data-placement="top" title="Eliminar">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        @endcan --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-3">
                    {{ $rows->links() }}
                </div>
                @else
                    <div class="px-6 py-4">
                        No existe ningún registro coincidente
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('livewire.modals.country.createModal')
    @include('livewire.modals.country.updateModal')
    @include('livewire.modals.country.viewModal')
</div>
@push('scripts')
    <script>
        window.addEventListener('open-modal', event => {
            console.log('hola mundo')
            $('#countryModal').modal({backdrop: 'static', keyboard: false});
            $('#updateCountryModal').modal({backdrop: 'static', keyboard: false});
        });
        window.addEventListener('close-modal', event => {
            $('#countryModal').modal('hide');
            $('#updateCountryModal').modal('hide');
            $('#viewCountryModal').modal('hide');
        });
        window.addEventListener('swal:modal', event => { 
            Swal.fire({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
            });
        });
        Livewire.on('deleteElement', elementId => {
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, bórralo!'
            }).then((result) => {
                //if user clicks on delete
                if (result.isConfirmed) {
                // calling destroy method to delete
                    @this.call('destroyCountry',elementId)
                // success response
                    Swal.fire(
                        'Eliminado!',
                        'Su Elemento ha sido eliminado.',
                        'success'
                    )
                } else {
                    Swal.fire({
                        title: 'Operación cancelada!',
                        icon: 'success'
                    });
                }
            })
        });
    </script>
@endpush
