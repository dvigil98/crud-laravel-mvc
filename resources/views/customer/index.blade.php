@extends('template/template')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-bold">Clientes</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de clientes</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="card-title">Lista de clientes</h3>
                        <a href="/customers/create" class="btn btn-light border ml-auto"><i class="fas fa-plus-circle"></i> Agregar cliente</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th>Id</th> -->
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                        <th>DNI</th>
                                        <th>Dirección</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $i)
                                    <tr>
                                        <!-- <td>{{ $i->id }}</td> -->
                                        <td>{{ $i->name }}</td>
                                        <td>{{ $i->phone }}</td>
                                        <td>{{ $i->email }}</td>
                                        <td>{{ $i->dni }}</td>
                                        <td>{{ $i->address }}</td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="/customers/{{ $i->id }}" class="btn btn-light border" title="Ver"><i class="fas fa-info-circle"></i></a>
                                                <a href="/customers/{{ $i->id }}/edit" class="btn btn-light border" title="Editar"><i class="fas fa-marker"></i></a>
                                                <a href="#" class="btn btn-light border" title="Eliminar" data-toggle="modal" data-target="#exampleModal{{ $i->id }}"><i class="fas fa-trash"></i></a>
                                            </div>
                                            <form action="/customers/{{ $i->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal fade" id="exampleModal{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar cliente</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4 class="text-danger text-center">¿Eliminar este registro?</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Eliminar</button>
                                                                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script>
    $('#customers').addClass('active')
    $('.table').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
        }
    })
</script>
@endpush
@endsection
