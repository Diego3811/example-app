<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Symfony\Contracts\Service\Attribute\Required;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::orderBy('id', 'desc')->get();
        $total = Product::count();
        return view('admin.product.home', compact(['products']));
    }

    public function create()
    {
        return view('admin.product.create');
    }
    public function save(Request $request)
    {
        $validation = $request->validate([
            'title' => 'Required',
            'category' => 'Required',
            'price' => 'Required'

        ]);
        $data = Product::create($validation);
        if ($data) {
            session()->flash('success', 'Product Add Successfully');
            return redirect(route('admin/products'));
        } else {
            session()->flash('error', 'Some problem occured');
            return redirect(route('admin.products/create'));
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.update', compact('product'));
    }



    public function delete($id)
    {
        $product = Product::findOrFail($id)->delete();
        if ($product) {
            session()->flash('success', 'Product Deleted Successfully');
            return redirect(route('admin/products'));
        } else {
        }
        session()->flash('error', 'Product Not Delete successfully');
        return redirect(route('admin/products'));
        $products = Product::findOrFail($id)->delete();
    }

    public function Update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $title = $request->title;
        $category = $request->category;
        $price = $request->price;

        $product->title = $title;
        $product->category = $category;
        $product->price = $price;
        $data = $product->save();

        if ($data) {
            session()->flash('success', 'Product Update Successfully');
            return redirect(route('admin/products'));
        } else {
            session()->flash('error', 'Some problem occured');
            return redirect(route('admin/products/update'));
        }
    }
}
