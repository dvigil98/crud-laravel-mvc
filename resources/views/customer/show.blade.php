@extends('template/template')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-bold">Clientes</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/customers">Lista de clientes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalles de cliente</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="/customers/{{ $customer->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal fade" id="exampleModal{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="#" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title">Detalles de cliente</h3>
                            <a href="/customers/{{ $customer->id }}/edit" class="btn btn-light border ml-auto"><i class="fas fa-marker"></i> Editar</a>
                            <a href="#" class="btn btn-light border ml-1" data-toggle="modal" data-target="#exampleModal{{ $customer->id }}"><i class="fas fa-trash"></i> Eliminar</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="text-muted mb-0">Id:</p>
                                        <p>{{ $customer->id }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p class="text-muted mb-0">Nombre:</p>
                                        <p>{{ $customer->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <p class="text-muted mb-0">Teléfono:</p>
                                        <p>{{ $customer->phone }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p class="text-muted mb-0">Email:</p>
                                        <p>{{ $customer->email }}</p>
                                    </div>
                                    <div class="form-group">
                                        <p class="text-muted mb-0">DNI:</p>
                                        <p>{{ $customer->dni }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p class="text-muted mb-0">Dirección:</p>
                                        <p>{{ $customer->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script>
    $('#customers').addClass('active')
</script>
@endpush
@endsection
