@extends('home')
@section('content')
<div class="container">
    <form class="frm_data p-3" action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="barcode" class="form-label">Barcode</label>
                    <input required class="form-control" type="text" id="barcode" name="barcode" value="{{ old('barcode') }}">
                </div>
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input required class="form-control" type="text" id="productName" name="productName">
                </div>
                <div class="m-3">
                    <label required for="exampleInputPassword1" class="form-label0">Part
                        Number</label>
                    <input class="form-input form-control form-control-sm" type="text" name="partNumber"></input>
                </div>
                <div class="m-3">
                    <div class="">
                        <label for="exampleInputPassword1" class="form-label w-100">Price</label>
                        <input required class="form-input form-control form-control-sm" type="number" name="price"></input>
                    </div>

                    <div class="">
                        <label for="exampleInputPassword1" class="form-label w-100">Discount</label>
                        <input class="form-input form-control form-control-sm" type="number" name="discount"></input>
                    </div>
                    <div class="">
                        <label for="exampleInputPassword1" class="form-label w-100">Warranty</label>
                        <input class="form-input form-control form-control-sm" type="text" name="warranty"></input>
                    </div>
                </div>
                <div class="m-3">
                    <div class="">
                        <label for="exampleInputPassword1" class="form-label w-100">Sub
                            Categoires</label>
                        <select required class="form-select form-control form-select-sm" name="subCategoryId">
                            @if (isset($subCategories))
                                @foreach ($subCategories as $s)
                                    <option value="{{ $s->id }}">{{ $s->categoryName }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="">
                        <label for="exampleInputPassword1" class="form-label w-100">Brand</label>
                        <select required class="form-select form-control form-select-sm" name="brand">
                            @if (isset($brand))
                                @foreach ($brand as $s)
                                    <option value="{{ $s->id }}">{{ $s->brandName }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <!-- Add other fields as needed -->
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="specifications" class="form-label">Specifications</label>
                    <textarea class="form-control form-control-sm" id="specifications" name="specifications" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control form-control-sm" id="description" name="description" rows="11">Hello, World!</textarea>
                </div>
                <!-- Add other fields as needed -->
            </div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image URLs</label>
            <textarea class="form-control form-control-sm" id="image" name="image" rows="5" placeholder="Enter image URLs separated by '|'"></textarea>
            <small class="form-text text-muted">You can add multiple image URLs separated by '|'</small>
        </div>
        <a href="{{ route('product') }}" class="btn btn-danger"><i class="fa-solid fa-xmark" style="margin-right: 5px"></i>Back</a>
        <button type="submit" class="btn btn-primary m-1">Add Product</button>
    </form>
</div>

@endsection
