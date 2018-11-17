@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg nav-pizza-dashboard">
    <div class="container-fluid">
        <a class="navbar-brand p-0" href="#"><img src="img/logo_min_text.png" height="30"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item ">
                <router-link to="/neworder" class="nav-link nav-s-item"><span class="fas fa-receipt"></span> Ordenar</router-link>
            </li>
            @can('Admin')
            <li class="nav-item">
                <router-link to="/orders" class="nav-link nav-s-item " href="#"><span class="fas fa-calendar-check"></span> Lista de ordenes</router-link>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link nav-s-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Cerrar Sesión') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <router-view></router-view>
</div> 
@endsection
