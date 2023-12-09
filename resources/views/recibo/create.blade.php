@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Recibo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Ingreso de Material</span>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body formulario">
                        <form method="POST" action="{{ route('recibos.store') }}" class="formulario"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('recibo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
