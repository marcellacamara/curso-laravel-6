@extends('admin.layouts.app')

@section('title', 'cadastrar novo produto')

@section('content')
    <h1>cadastrar novo produto</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        {{-- <input type="text" name="_token" value="{{csrf_token()}}"> --}}
        @csrf
        <input type="text" name="name" placeholder="nome:" value="{{old('name')}}">
        <input type="text" name="description" placeholder="descrição:" value="{{old('description')}}">
        <input type="file" name="photo">
        <button type="submit">enviar</button>
    </form>
@endsection