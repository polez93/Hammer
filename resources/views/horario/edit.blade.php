@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Horario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Horario</span>
                    </div>
                    <div class="card-body formulario">
                        <form method="POST" action="{{ route('horarios.update', $horario->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('horario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
