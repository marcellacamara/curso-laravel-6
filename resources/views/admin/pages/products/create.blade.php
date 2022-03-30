@extends('admin.layouts.app')

@section('title', 'cadastrar novo produto')

@section('content')
    <h1>cadastrar novo produto</h1>

    <form action="{{route('products.store')}}" method="post">
        {{-- <input type="text" name="_token" value="{{csrf_token()}}"> --}}
        @csrf
        <input type="text" name="name" placeholder="nome:">
        <input type="text" name="description" placeholder="descrição:">
        <button type="submit">enviar</button>
    </form>
@endsection