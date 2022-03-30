<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        //$this->middleware('auth')->only('create');
        //$this->middleware('auth')->except('index');
        // $this->middleware('auth')->only([
        //     'create', 'store'
        // ]);
        //$this->middleware('auth')->only('create');
    }

    public function index()
    {
        $teste = 123;
        $teste2 = 456;
        $teste3 = [1, 2, 3, 4, 5];
        return view('admin.pages.products.index', compact('teste', 'teste2', 'teste3'));
    }


    public function create()
    {
        return view('admin.pages.products.create');
    }


    public function store(Request $request)
    {
        dd('cadastrando');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
