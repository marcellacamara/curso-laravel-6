{{-- @extends('admin.layouts.app') --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Exibindo os produtos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('products.create')}}" class="btn btn-primary">cadastrar</a>
    <hr>

    <form action="{{route('products.search')}}" method="post" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="filtrar:" class="form-control" value="{{$filters['filter'] ?? '' }}">
        <button type="submit" class="btn btn-info">pesquisar</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th width="100">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        @if ($product->image)
                            <img src="{{url("storage/{$product->image}")}}" alt="{{$product->name}}" style="max-width: 100px">
                        @endif
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('products.edit', $product->id)}}">Editar</a>
                        <a href="{{route('products.show', $product->id)}}">Detalhes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (isset($filters))
        {!!$products->appends($filters)->links()!!}
    @else
        {!!$products->links()!!}
    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>