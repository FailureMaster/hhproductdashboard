<x-layout>
        <div class="header">
            <div class="header-content">
                <div>
                    <h1>Edit Product</h1>
                    <p>Update product information</p>
                </div>
            </div>
        </div>

        <div class="container">
            <a href="{{route('dashboard.admin')}}" class="btn btn-secondary back-btn">⬅️ Back to Products</a>

            <div class="card">
                <div class="card-header">
                    <h2>Update Product Information</h2>
                    <p>Modify the details for this product</p>
                </div>
                <div class="card-body">
                    <form id="editProductForm" action="{{route('product.update', $product->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="edit_name">Product Name</label>
                                <input type="text" id="edit_name" name="name" class="form-control" required value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="edit_price">Price ($)</label>
                                <input type="number" id="edit_price" name="price" class="form-control" step="0.01" min="0" required value="{{$product->price}}">
                            </div>
                        </div>

                        <div class="form-group full-width">
                            <label for="edit_description">Description</label>
                            <textarea id="edit_description" name="description" class="form-control" required>{{$product->description}}</textarea>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="edit_inventory">Current Inventory</label>
                                <input type="number" id="edit_inventory" name="inventory" class="form-control" min="0" required value="{{$product->inventory}}">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" onclick="showListPage()" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-success">💾 Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-layout>
