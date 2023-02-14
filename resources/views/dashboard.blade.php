<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>
                        Hola {{ Auth::user()->name }}
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
                    <th>Tiempo Espera (min)</th>
                    <th>Tiempo Sumergido (min)</th>
                    <th>Comentarios</th>
                    <th>Estado</th>
                    <th>Accion</th>
                    <th>Tiempo</th>
                </tr>
            </thead>
            <tbody>
                @forelse  ($plantas as $planta)
                    <tr>
                        <td>{{ $planta->id_config }}</td>
                        <td>{{ $planta->nombre_planta }}</td>
                        <td>{{ $planta->tiempo_espera }}</td>
                        <td>{{ $planta->tiempo_sumergido }}</td>
                        <td>{{ $planta->comentarios }}</td>

                        @if ($planta->estado == 0)
                            <td>Ejecutandose</td>
                            <td><a href="" type="button"><i class="fa fa-power-off red-icon"
                                        aria-hidden="true"></i></a></td>
                        @else
                            <td>Inactivo</td>
                            <td><a href="" type="button"><i class="fa fa-power-off green-icon"
                                        aria-hidden="true"></i></a></td>
                        @endif
                        <td>
                            <div class="countdown"></div>
                        </td>
                    </tr>
                @empty
                @endforelse
            <tbody>
        </table>
    </div>

</x-app-layout>
<script>
    localStorage.setItem("tiempo", "0:10");
    var timer2 = localStorage.getItem("tiempo");
    var interval = setInterval(function() {
        var timer = timer2.split(':');
        //by parsing integer, I avoid all extra string processing
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0) clearInterval(interval);
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        //minutes = (minutes < 10) ?  minutes : minutes;
        $('.countdown').html(minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
    }, 1000);

    window.onbeforeunload = function() {
        return 'Are you sure you want to leave?';
    };
</script>
<style>
    @import 'bootstrap/scss/bootstrap';

    .red-icon {
        color: red;
    }

    .green-icon {
        color: green;
    }


    * {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    body {
        font-family: Helvetica;
        -webkit-font-smoothing: antialiased;
        background: rgba(71, 147, 227, 1);
    }

    h2 {
        text-align: center;
        font-size: 18px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: white;
        padding: 30px 0;
    }

    /* Table Styles */

    .table-wrapper {
        margin: 10px 70px 70px;
        box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
    }

    .fl-table {
        border-radius: 5px;
        font-size: 12px;
        font-weight: normal;
        border: none;
        border-collapse: collapse;
        width: 100%;
        max-width: 100%;
        white-space: nowrap;
        background-color: white;
    }

    .fl-table td,
    .fl-table th {
        text-align: center;
        padding: 8px;
    }

    .fl-table td {
        border-right: 1px solid #f8f8f8;
        font-size: 12px;
    }

    .fl-table thead th {
        color: #ffffff;
        background: #4FC3A1;
    }


    .fl-table thead th:nth-child(odd) {
        color: #ffffff;
        background: #324960;
    }

    .fl-table tr:nth-child(even) {
        background: #F8F8F8;
    }

    /* Responsive */

    @media (max-width: 767px) {
        .fl-table {
            display: block;
            width: 100%;
        }

        .table-wrapper:before {
            content: "Scroll horizontally >";
            display: block;
            text-align: right;
            font-size: 11px;
            color: white;
            padding: 0 0 10px;
        }

        .fl-table thead,
        .fl-table tbody,
        .fl-table thead th {
            display: block;
        }

        .fl-table thead th:last-child {
            border-bottom: none;
        }

        .fl-table thead {
            float: left;
        }

        .fl-table tbody {
            width: auto;
            position: relative;
            overflow-x: auto;
        }

        .fl-table td,
        .fl-table th {
            padding: 20px .625em .625em .625em;
            height: 60px;
            vertical-align: middle;
            box-sizing: border-box;
            overflow-x: hidden;
            overflow-y: auto;
            width: 120px;
            font-size: 13px;
            text-overflow: ellipsis;
        }

        .fl-table thead th {
            text-align: left;
            border-bottom: 1px solid #f7f7f9;
        }

        .fl-table tbody tr {
            display: table-cell;
        }

        .fl-table tbody tr:nth-child(odd) {
            background: none;
        }

        .fl-table tr:nth-child(even) {
            background: transparent;
        }

        .fl-table tr td:nth-child(odd) {
            background: #F8F8F8;
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tr td:nth-child(even) {
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tbody td {
            display: block;
            text-align: center;
        }
    }
</style>
