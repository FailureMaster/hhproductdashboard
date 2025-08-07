<x-layout>

        <div class="header">
            <div class="header-content">
                <div>
                    <h1>Add Product</h1>
                    <p>Update product information</p>
                </div>
            </div>
        </div>

        <div class="container">
           @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

            <a href="{{route('dashboard')}}" class="btn btn-secondary back-btn">⬅️ Back to Products</a>

            <div class="card">
                <div class="card-header">
                    <h2>Update Product Information</h2>
                    <p>Modify the details for this product</p>
                </div>
                <div class="card-body">
                    <form id="editProductForm" action="{{route('product.store')}}" method="POST">
                        @csrf
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="add_name">Product Name</label>
                                <input type="text" id="add_name" name="name" class="form-control" required value="">
                            </div>
                            <div class="form-group">
                                <label for="add_name">Price ($)</label>
                                <input type="number" id="add_name" name="price" class="form-control" step="0.01" min="0" required value="">
                            </div>
                        </div>

                        <div class="form-group full-width">
                            <label for="add_description">Description</label>
                            <textarea id="add_description" name="description" class="form-control" required></textarea>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="add_inventory">Current Inventory</label>
                                <input type="number" id="add_inventory" name="inventory" class="form-control" min="0" required value="">
                            </div>
                            <div class="form-group">
                                <label for="edit_category">Category</label>
                                <select id="edit_category" name="category" class="form-control">
                                    <option value="">Select Category</option>
                                    <option value="clothing" selected>Clothing</option>
                                    <option value="accessories">Accessories</option>
                                    <option value="electronics">Electronics</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="{{route('dashboard')}}"  onclick="showListPage()" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">💾 Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-layout>
