@extends('admin.layouts.app')

@section('title', 'editar produto')

@section('content')
    <h1>editar produto {{$id}}</h1>

    <form action="{{route('products.update', $id)}}" method="post">
        {{-- <input type="text" name="_token" value="{{csrf_token()}}"> --}}
        {{-- <input type="hidden" name="_method" value="PUT"> --}}
        @method('PUT')
        @csrf
        <input type="text" name="name" placeholder="nome:">
        <input type="text" name="description" placeholder="descrição:">
        <button type="submit">enviar</button>
    </form>
@endsection