@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; padding: 20px 0;">
    <div class="jalt-card" style="width: 100%; max-width: 800px;">
        <div class="jalt-card-header">
            <i class="bi bi-plus-circle me-2"></i> Add New Product
        </div>
        <div class="jalt-card-body" style="padding: 30px;">
            
            @if(session('success'))
                <div class="jalt-alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('/admin/store-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div style="display: flex; gap: 20px; margin-bottom: 20px; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 250px;">
                        <label class="jalt-label">Product Name</label>
                        <input type="text" name="name" class="jalt-input" placeholder="e.g. Breaking Bad T-shirt" required>
                    </div>
                    <div style="flex: 1; min-width: 250px;">
                        <label class="jalt-label">Category</label>
                        <select name="category" class="jalt-input" style="background-color: white;">
                            <option value="drop-shoulder">Drop Shoulder</option>
                            <option value="regular">Regular</option>
                            <option value="full-sleeve">Full Sleeve</option>
                            <option value="hoodie">Hoodie</option>
                        </select>
                    </div>
                </div>

                <div class="jalt-form-group">
                    <label class="jalt-label">Price (Tk)</label>
                    <input type="number" name="price" class="jalt-input" placeholder="500" required>
                </div>

                <div style="display: flex; gap: 20px; margin-bottom: 20px; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 250px;">
                        <label class="jalt-label" style="color: var(--jalt-orange);">Available Sizes</label>
                        <input type="text" name="sizes" class="jalt-input" placeholder="S, M, L, XL">
                        <small style="color: #888;">Example: M, L, XL</small>
                    </div>
                    <div style="flex: 1; min-width: 250px;">
                        <label class="jalt-label" style="color: var(--jalt-orange);">Available Colors</label>
                        <input type="text" name="colors" class="jalt-input" placeholder="Black, White, Blue">
                        <small style="color: #888;">Example: Black, Blue</small>
                    </div>
                </div>

                <div class="jalt-form-group">
                    <label class="jalt-label">Description</label>
                    <textarea name="description" rows="3" class="jalt-input" style="height: auto; resize: vertical;" placeholder="Write something about product..."></textarea>
                </div>

                <div class="jalt-form-group" style="margin-bottom: 30px;">
                    <label class="jalt-label">Product Image</label>
                    <input type="file" name="image" class="jalt-input" style="padding: 8px;" required>
                </div>

                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <button type="submit" class="btn-jalt" style="font-size: 1.1rem;">
                        <i class="bi bi-save me-2"></i> Save Product
                    </button>
                    <a href="{{ url('/admin/products') }}" style="text-align: center; color: #777; text-decoration: none; font-weight: bold; padding: 10px;">
                        Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection