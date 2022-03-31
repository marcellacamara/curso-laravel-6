<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
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


    public function store(StoreUpdateProductRequest $request)
    {
        /*
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo' => 'required|image',
        ]);
        */

        dd('OK');

        // dd($request->all());
        // dd($request->name);
        // dd($request->only(['name']['description']));
        // dd($request->input('teste', 'default'));
        // dd($request->except('name'));
        if ($request->file('photo')->isValid()) {
            //$request->file('photo')->store('products');
            $nameFile = $request->name . '.' . $request->photo->extension();
            $request->file('photo')->storeAs('products', $nameFile);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id'));
    }


    public function update(Request $request, $id)
    {
        dd("editando o produto {$id}");
    }


    public function destroy($id)
    {
        //
    }
}
