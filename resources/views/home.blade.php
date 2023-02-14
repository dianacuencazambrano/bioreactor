@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h1>
                                    Hola {{Auth::user()->name}}
                                </h1>
            
                            </div>
                        </div>
                    </div>
                </div>
                <h2>Plantas registradas</h2>
                <div class="table-wrapper">
                    <table class="fl-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tiempo Espera</th>
                                <th>Tiempo Sumergido</th>
                                <th>Comentarios</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plantas as $planta)
                            <tr>
                                <td>{{$planta->id_configuracion}}</td>
                                <td>{{$planta->nombre_planta}}</td>
                                <td>{{$planta->tiempo_espera}}</td>
                                <td>{{$planta->tiempo_sumergido}}</td>
                                <td>{{$planta->comentarios}}</td>
                                <td>{{$planta->estado}}</td>
                            </tr>
                            @endforeach
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
