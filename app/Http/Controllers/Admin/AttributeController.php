<?php 

// app/Http/Controllers/Admin/AttributeController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
public function index()
{
$attributes = Attribute::with('parent')->get();
return view('admin.attributes.index', compact('attributes'));
}

public function create()
{
$parents = Attribute::whereNull('parent_id')->get();
return view('admin.attributes.create', compact('parents'));
}

public function store(Request $request)
{
$request->validate([
'name' => 'required|string|max:255',
'parent_id' => 'nullable|exists:attributes,id',
]);

Attribute::create($request->all());

return redirect()->route('admin.attributes.index')->with('success', 'Attribute created successfully.');
}

public function show(Attribute $attribute)
{
return view('admin.attributes.show', compact('attribute'));
}

public function edit(Attribute $attribute)
{
$parents = Attribute::whereNull('parent_id')->get();
return view('admin.attributes.edit', compact('attribute', 'parents'));
}

public function update(Request $request, Attribute $attribute)
{
$request->validate([
'name' => 'required|string|max:255',
'parent_id' => 'nullable|exists:attributes,id',
]);

$attribute->update($request->all());

return redirect()->route('admin.attributes.index')->with('success', 'Attribute updated successfully.');
}

public function destroy(Attribute $attribute)
{
$attribute->delete();
return redirect()->route('admin.attributes.index')->with('success', 'Attribute deleted successfully.');
}
}