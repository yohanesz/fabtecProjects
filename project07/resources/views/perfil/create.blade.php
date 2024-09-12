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
    
    <form class="d-flex justify-content-center" action="{{ route('perfil.store') }}" method="POST">
        @include('perfil.form')
    
</div>
@endsection