@extends('layouts.app')

@section('content')
<div class="nav-pizza">
    <img src="img/logo.png" height="80">
</div>
<div class="container">   
    <div class="row d-flex justify-content-center">
        <div class="col-sm-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="label-bold">Correo electrónico</label>
                    <input id="email" type="email" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Ingresa tu correo"  name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password" class="label-bold">Contraseña</label>
                    <input id="password" type="password" class="form-control form-control-sm {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Ingresa tu contraseña" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success btn-sm">Ingresar ahora</button>
                <a href="{{ url('/') }}" class="btn btn-link btn-sm text-dark">Volver a inicio</a>
            </form>
        </div>
    </div>
</div>
@endsection
