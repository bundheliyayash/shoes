<!-- resources/views/admin/attributes/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Attribute</h1>

    <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $attribute->name }}" required>
        </div>
        <div class="form-group">
            <label for="parent_id">Parent Attribute</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">None</option>
                @foreach ($attributes as $attr)
                    <option value="{{ $attr->id }}" {{ $attribute->parent_id == $attr->id ? 'selected' : '' }}>{{ $attr->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection