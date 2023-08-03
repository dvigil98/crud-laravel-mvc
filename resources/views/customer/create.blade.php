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
                    <li class="breadcrumb-item active" aria-current="page">Agregar cliente</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="/customers" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title">Agregar cliente</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Nombre: @error('name') <small class="text-danger">{{ $message }} *</small>@enderror </label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre..." value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Teléfono: @error('phone') <small class="text-danger">{{ $message }} *</small>@enderror </label>
                                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Teléfono..." value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email: @error('email') <small class="text-danger">{{ $message }} *</small>@enderror </label>
                                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email..." value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="dni">DNI: @error('dni') <small class="text-danger">{{ $message }} *</small>@enderror </label>
                                        <input type="text" name="dni" id="dni" class="form-control @error('dni') is-invalid @enderror" placeholder="DNI..." value="{{ old('dni') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="address">Dirección: @error('address') <small class="text-danger">{{ $message }} *</small>@enderror </label>
                                        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Dirección..." value="{{ old('address') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Guardar</button>
                            <a href="/customers" class="btn btn-dark"><i class="fas fa-times"></i> Cancelar</a>
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
