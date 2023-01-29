<div>
    <div class="card">
        <div class="card-head">
            <div class="d-flex justify-content-between">
                @include('common.searchBox')
                @can('user.create')
                    <div class="p-2">
                        <button type="button" class="btn btn-sm btn-success" wire:click="createUser()" data-placement="top" title="Agregar" data-bs-toggle="modal" data-bs-target="#userModal">
                            <i class="fa-solid fa-square-plus"></i>
                        </button>
                    </div>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive-md">
                @if (count($rows))
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>

                            @if(auth()->user()->hasAnyPermission(['user.edit', 'user.delete']))
                                <th scope="col">action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                @if(auth()->user()->hasAnyPermission(['user.edit', 'user.delete']))
                                <td>
                                    <div class="btn-group" role="group">
                                        @can('user.edit')
                                        <button type="button" class="btn btn-sm btn-info" wire:click="editUser({{ $row->id }})" data-placement="top" title="Editar" data-bs-toggle="modal" data-bs-target="#updateUserModal">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        @endcan
                                        @can('user.delete')
                                        <button type="button" class="btn btn-sm btn-danger" wire:click="$emit('deleteElement', {{ $row->id }})" data-placement="top" title="Eliminar">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        @endcan
                                    </div>
                                </td>
                                @endif
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
    @include('livewire.modals.user.createModal')
    @include('livewire.modals.user.updateModal')
</div>
@push('scripts')
    <script>
        window.addEventListener('open-modal', event => {
            $('#userModal').modal({backdrop: 'static', keyboard: false});
            $('#updateUserModal').modal({backdrop: 'static', keyboard: false});
        });
        window.addEventListener('close-modal', event => {
            $('#userModal').modal('hide');
            $('#updateUserModal').modal('hide');
            $('#deleteUserModal').modal('hide');
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
                    @this.call('destroyUser',elementId)
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
