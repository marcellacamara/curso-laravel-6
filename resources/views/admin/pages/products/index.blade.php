@extends('admin.layouts.app')

@section('title', 'Gestão de produtos')

@section('content')
    <h1>Exibindo os produtos</h1>
    <a href="{{route('products.create')}}">cadastrar</a>
    <hr>


    @component('admin.components.card')
        @slot('title')
            <h2>título card</h2>
        @endslot
        um card de exemplo
    @endcomponent

    <hr>

   
    @include('admin.includes.alerts', ['content'=> 'alerta de alerta'])

    <hr>

    @if (isset($teste3))
        @foreach ($teste3 as $t3)
            <p @class(['last' => $loop->last])>{{$t3}}</p>
        @endforeach
    @endif

    <hr>

    @forelse ($teste3 as $t3)
        <p @class(['last' => $loop->first])>{{$t3}}</p>
    @empty
        <p>não existem números cadastrados</p>
    @endforelse

    <hr>

    @if ($teste === 123)
        {{-- é igual --}}
    @else 
        {{-- é diferente --}}
    @endif

    @unless ($teste === '123')
        {{-- falso --}}
    @else
        {{-- verdadeiro --}}
    @endunless

    @isset($teste2)
        <p>{{$teste2}} passou</p>
    @endisset

    @empty($teste3)
        <p>vazio</p>
    @else
        <p>cheio</p>
    @endempty

    @auth
        <p>autenticado</p>
    @else
        <p>não está autenticado</p>
    @endauth

    @guest
        <p>não está autenticado</p>
    @endguest

    @switch($teste)
        @case(1)
            igual 1
            @break
        @case(123)
            igual 123
            @break
        @default
            default
    @endswitch
@endsection

@push('styles')
    <style>
        .last{background: #eea7c2}
    </style>
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#fff2f9'
    </script>
@endpush