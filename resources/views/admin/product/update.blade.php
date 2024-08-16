<x-app-layout>
    slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ _('Edit Product') }}
    </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm: px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm: rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Edit Product</h1>
                    <hr />
                    Form
                </div>

                <form action="{{ route('admin/products/update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$product->title}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Category</label>
                            <input type="text" name="category" class="form-control" placeholder="category" value="{{$product->category}}">
                        </div>
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="price" class="form-control" placeholder="product-price" value="{{$product->price}}">
            </div>
        </div>


        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>

    </div>
</x-app-layout>