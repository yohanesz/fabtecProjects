@extends('app')
 
    @push('style')
        <link rel="stylesheet" href="{{ asset('css/index.css')}}">
    @endpush

   @section('body')

   <div class="mainContainer">
    <header>
        <nav>
        </nav>
    </header>
    <br>
    <form class="" action="{{ route('usuario.update', $usuarioSelecionado->id) }}" method="POST">
    @method('PUT')

    @include('usuario.form')    
    </div>
    @endsection



