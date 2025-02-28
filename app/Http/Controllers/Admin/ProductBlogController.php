<?php

// app/Http/Controllers/Admin/ProductBlogController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductBlog;
use Illuminate\Http\Request;

class ProductBlogController extends Controller
{
    public function index()
    {
        $blogs = ProductBlog::with('shoe')->get();
        return view('admin.product-blogs.index', compact('blogs'));
    }

    public function create()
    {
        $shoes = \App\Models\Shoe::all();
        return view('admin.product-blogs.create', compact('shoes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shoes_id' => 'required|exists:shoes,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'product_story' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        ProductBlog::create($data);

        return redirect()->route('admin.product-blogs.index')->with('success', 'Product blog created successfully.');
    }

    public function show(ProductBlog $productBlog)
    {
        return view('admin.product-blogs.show', compact('productBlog'));
    }

    public function edit(ProductBlog $productBlog)
    {
        $shoes = \App\Models\Shoe::all();
        return view('admin.product-blogs.edit', compact('productBlog', 'shoes'));
    }

    public function update(Request $request, ProductBlog $productBlog)
    {
        $request->validate([
            'shoes_id' => 'required|exists:shoes,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'product_story' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $productBlog->update($data);

        return redirect()->route('admin.product-blogs.index')->with('success', 'Product blog updated successfully.');
    }

    public function destroy(ProductBlog $productBlog)
    {
        $productBlog->delete();
        return redirect()->route('admin.product-blogs.index')->with('success', 'Product blog deleted successfully.');
    }
}