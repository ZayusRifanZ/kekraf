<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductGallery;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ProductRequest;

class DashboardProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::with( 'category', 'galleries')
            ->where('users_id', Auth::user()->id)
            ->get();
        
        return view('pages.store.dashboard-products', [
            'products' => $product, 
        ]);
    }

    public function details(Request $request, $id)
    {
        $product = Product::with(['galleries','user','category'])->findOrFail($id);
        $categories = Category::all();

        return view('pages.store.dashboard-products-details', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-product-detail', $request->products_id)->with('message', 'Galleri berhasil ditambahkan');
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        Storage::disk('local')->delete('public/'.$item->photos);
        $item->delete();
        return redirect()->route('dashboard-product-detail', $item->products_id)->with('message', 'Data berhasil dihapus');
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.store.dashboard-products-create', [
            'categories' => $categories
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $product = Product::create($data);
        
        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/product', 'public')
        ];

        ProductGallery::create($gallery);

        return redirect()->route('dashboard-product')->with('message', 'Data berhasil ditambahkan');
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $item = Product::findOrFail($id);

        $data['slug'] = Str::slug($request->name);
        
        $item->update($data);

        return redirect()->route('dashboard-product')->with('message', 'Data berhasil diubah');
    }
}
