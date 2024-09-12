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
    <form action="{{ route('usuario.store') }}" method="POST">

    @include('usuario.form')    
    </div>
    @endsection

