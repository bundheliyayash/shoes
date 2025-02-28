<?php

// app/Http/Controllers/Admin/ShoeController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shoe;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    public function index()
    {
        $shoes = Shoe::with('company')->get();
        return view('admin.shoes.index', compact('shoes'));
    }

    public function create()
    {
        $companies = \App\Models\Company::all();
        return view('admin.shoes.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'com_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'nullable|url',
            'company_pro_id' => 'nullable|integer',
            'gallery' => 'nullable|json',
            'price' => 'required|numeric',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('shoes', 'public');
        }

        Shoe::create($data);

        return redirect()->route('admin.shoes.index')->with('success', 'Shoe created successfully.');
    }

    public function show(Shoe $shoe)
    {
        return view('admin.shoes.show', compact('shoe'));
    }

    public function edit(Shoe $shoe)
    {
        $companies = \App\Models\Company::all();
        return view('admin.shoes.edit', compact('shoe', 'companies'));
    }

    public function update(Request $request, Shoe $shoe)
    {
        $request->validate([
            'com_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'nullable|url',
            'company_pro_id' => 'nullable|integer',
            'gallery' => 'nullable|json',
            'price' => 'required|numeric',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('shoes', 'public');
        }

        $shoe->update($data);

        return redirect()->route('admin.shoes.index')->with('success', 'Shoe updated successfully.');
    }

    public function destroy(Shoe $shoe)
    {
        $shoe->delete();
        return redirect()->route('admin.shoes.index')->with('success', 'Shoe deleted successfully.');
    }
}