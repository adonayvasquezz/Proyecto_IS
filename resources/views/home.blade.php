@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: #ed2b46; font-size:20px">¡Bienvenido!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Adquiere tus boletos y viaja a cualquiera de nuestros destinos principales.

                    {{-- @if(@Auth::user()->hasRole('empleado'))
                        <h2>Eres un Empleado</h2>
                    @endif --}}

                </div>
            </div>
                <div class="card">
                    <img src="../images/fotojet.png">
            </div>
        </div>
    </div>
</div>
@endsection
