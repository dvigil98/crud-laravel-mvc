@extends('template/template')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-bold">Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
    </div>
</section>
@push('scripts')
<script>
    $('#dashboard').addClass('active')
</script>
@endpush
@endsection
