@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; padding: 20px 0;">
    <div class="jalt-card" style="width: 100%; max-width: 800px;">
        <div class="jalt-card-header">
            <i class="bi bi-pencil-square me-2"></i> Edit Product: {{ $product->name }}
        </div>
        <div class="jalt-card-body" style="padding: 30px;">
            
            <form action="{{ url('/admin/update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div style="display: flex; gap: 20px; margin-bottom: 20px; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 250px;">
                        <label class="jalt-label">Product Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="jalt-input" required>
                    </div>
                    <div style="flex: 1; min-width: 250px;">
                        <label class="jalt-label">Category</label>
                        <select name="category" class="jalt-input" style="background-color: white;" required>
                            <option value="drop-shoulder" {{ $product->category == 'drop-shoulder' ? 'selected' : '' }}>Drop Shoulder</option>
                            <option value="hoodie" {{ $product->category == 'hoodie' ? 'selected' : '' }}>Hoodie</option>
                            <option value="regular" {{ $product->category == 'regular' ? 'selected' : '' }}>Regular</option>
                        </select>
                    </div>
                </div>

                <div class="jalt-form-group">
                    <label class="jalt-label">Price (Tk)</label>
                    <input type="number" name="price" value="{{ $product->price }}" class="jalt-input" required>
                </div>

                <div style="display: flex; gap: 20px; margin-bottom: 20px; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 250px;">
                        <label class="jalt-label" style="color: var(--jalt-orange);">Available Sizes</label>
                        <input type="text" name="sizes" value="{{ $product->sizes }}" class="jalt-input" placeholder="e.g. S, M, L">
                    </div>
                    <div style="flex: 1; min-width: 250px;">
                        <label class="jalt-label" style="color: var(--jalt-orange);">Available Colors</label>
                        <input type="text" name="colors" value="{{ $product->colors }}" class="jalt-input" placeholder="e.g. Black, White">
                    </div>
                </div>

                <div class="jalt-form-group">
                    <label class="jalt-label">Description</label>
                    <textarea name="description" rows="3" class="jalt-input" style="height: auto; resize: vertical;" required>{{ $product->description }}</textarea>
                </div>

                <div class="jalt-form-group" style="margin-bottom: 30px;">
                    <label class="jalt-label">Product Image (Optional)</label>
                    <input type="file" name="image" class="jalt-input" style="padding: 8px; margin-bottom: 15px;">
                    
                    <div style="padding: 15px; border: 1px dashed #ddd; border-radius: 10px; display: inline-block; background: #fdfdfd;">
                        <small style="color: #888; display: block; margin-bottom: 10px;">Current Image:</small>
                        <img src="{{ asset('uploads/'.$product->image) }}" style="width: 120px; border-radius: 8px; box-shadow: var(--shadow);">
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <button type="submit" class="btn-jalt" style="font-size: 1.1rem; background-color: var(--jalt-orange);">
                        <i class="bi bi-check-circle me-2"></i> Update Product
                    </button>
                    <a href="{{ url('/admin/products') }}" style="text-align: center; color: #777; text-decoration: none; font-weight: bold; padding: 10px;">
                        Cancel
                    </a>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection