<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="header-section">
                        <h1 class="title">List Product</h1>
                        <a href="{{ route('admin/products/create') }}" class="btn-primary">Add Product</a>
                    </div>

                    <hr class="divider" />

                    @if (Session::has('success'))
                        <div class="alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <div class="table-container">
                        <table class="product-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin/products/edit', ['id' => $product->id]) }}" class="btn-secondary">Edit</a>
                                                <a href="{{ route('admin/products/delete', ['id' => $product->id]) }}" class="btn-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Product not found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>