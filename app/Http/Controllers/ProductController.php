<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->repository = $product;
        //$this->middleware('auth')->only('create');
        //$this->middleware('auth')->except('index');
        // $this->middleware('auth')->only([
        //     'create', 'store'
        // ]);
        //$this->middleware('auth')->only('create');
    }

    public function index()
    {
        $products = Product::paginate();
        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }


    public function create()
    {
        return view('admin.pages.products.create');
    }


    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->only('name', 'description', 'price');

        if ($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('products');

            $data['image'] = $imagePath;
        }

        $this->repository->create($data);

        return redirect()->route('products.index');

        // if ($request->file('photo')->isValid()) {
        //     //$request->file('photo')->store('products');
        //     $nameFile = $request->name . '.' . $request->file('photo')->extension();
        //     $request->file('photo')->storeAs('products', $nameFile);
        // }
    }


    public function show($id)
    {
        //$product = Product::where('id', $id)->firts();
        if (!$product = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.products.show', [
            'product' => $product
        ]);
    }


    public function edit($id)
    {
        if (!$product = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.products.edit', compact('product'));
    }


    public function update(StoreUpdateProductRequest $request, $id)
    {
        if (!$product = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->all();

        if ($request->hasFile('image') && $request->image->isValid()) {

            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $imagePath = $request->image->store('products');
            $data['image'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        if (!$product = $this->repository->find($id)) {
            return redirect()->back();
        }

        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            'products' => $products,
            'filters' => $filters,
        ]);
    }
}
