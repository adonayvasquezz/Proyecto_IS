@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">¡Bienvenido!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ¿A donde viajaras?

                    @if(@Auth::user()->hasRole('empleado'))
                        <h2>Eres un Empleado</h2>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
