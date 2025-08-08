<x-dashboard>
       <!-- Product List Page -->
    <div id="listPage" class="page-nav active">
        <div class="header">
            <div class="header-content">
                <div>
                    <h1>Manage Products</h1>
                    <p>Manage your product inventory and details</p>
                </div>
                <div class="header-actions">
                    <a href="#" class="btn btn-secondary">Dashboard</a>
                    <a href="{{route('product.create')}}" class="btn btn-primary">➕ Add Product</a>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Success Message -->
            <!-- <div class="alert alert-success">Product added successfully!</div> -->

            <div class="card">
                <div class="card-header">
                    <h2>Product Inventory</h2>
                    <p>View and manage all your products</p>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table id="productsTable">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Inventory</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="product-name">{{$product->name}}</td>
                                        <td class="product-price">{{$product->price}}</td>
                                        <td><span class="inventory-badge inventory-high">{{$product->inventory}}</span></td>
                                        <td>{{$product->created_at->format('M j, Y')}}</td>
                                        <td class="actions">
                                            <a href="{{route('product.edit', $product->id)}}" class="btn btn-sm btn-primary">✏️ Edit</a>
                                            <form action="{{route('product.delete', $product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>
