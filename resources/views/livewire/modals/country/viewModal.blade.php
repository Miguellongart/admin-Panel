<!--  user Create -->
<div wire:ignore.self class="modal fade modal-xl" id="viewCountryModal" tabindex="-1" aria-labelledby="viewCountryModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewCountryModal">{{$pageTitle}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-md">
                    @if (count($provinceCountry))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">pais</th>
                                <th scope="col">nombre</th>
                                <th scope="col">iso2</th>
                                <th scope="col">iso3</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($provinceCountry as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->country->name}}</td>
                                    <td>{{$row->nombre}}</td>
                                    <td>{{$row->iso2}}</td>
                                    <td>{{$row->iso3}}</td>
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
    </div>
</div>