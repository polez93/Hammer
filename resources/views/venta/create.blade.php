@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"><i class="fa-regular fa-square-plus fa-lg me-2"></i>Nueva Venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventas.store') }}"  role="form" class="needs-validation" enctype="multipart/form-data">
                            @csrf

                            @include('venta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
