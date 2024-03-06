@extends('home')

@section('content')
    @include('subForm.productImgView')
    @include('subForm.confirmMessage')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
    <div class="conatiner w-100">
        @if (Session::has('message') && Session::has('message'))
            <div class="alert {{ Session::get('message') }} alert-dismissible" role="alert">
                {{ Session::get('text') }}
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <form action="{{ route('productFilter') }}" id="form-data" method="POST" enctype="multipart/form-data"
            class="d-flex w-100 h-25 align-items-end justify-content-around">
            @csrf
            <div class="m-3 w-25 ">
                <label for="exampleInputEmail1" class="form-label w-100">Main Categoires</label>
                <select class="form-select form-control" name="searchMainCategory" >
                    <option value="0" {{ old('searchMainCategory') == '0' ? 'selected' : ''}}>None</option>
                    @if (isset($mainCategories))
                        @foreach ($mainCategories as $s)
                            <option value="{{ $s->id }}" {{ old('searchMainCategory') == $s->id ? 'selected' : ''}}>{{ $s->categoryName }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="m-3 w-25">
                <label for="exampleInputPassword1" class="form-label w-100">Sub Categoires</label>
                <select class="form-select form-control" name="searchSubCategory">
                    <option value="0" {{ old('searchSubCategory') == '0' ? 'selected' : '' }}>None</option>
                    @if (isset($subCategories))
                        @foreach ($subCategories as $s)
                            <option value="{{ $s->id }}" {{ old('searchSubCategory') == $s->id ? 'selected' : '' }}>{{ $s->categoryName }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="m-3 w-25">
                <label for="exampleInputPassword1" class="form-label w-100">Brand</label>
                <select class="form-select form-control" name="brand">
                    <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}>None</option>
                    @if (isset($brand))
                        @foreach ($brand as $s)
                            <option value="{{ $s->id }}" {{ old('brand') == $s->id ? 'selected' : '' }}>{{ $s->brandName }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            {{-- <div class="m-3 w-25">
                <label for="exampleInputPassword1" class="form-label w-100">Start Date</label>
                <input class="form-select form-control" type="datetime-local" name="searchStartDate"></input>
            </div>
            <div class="m-3 w-25">
                <label for="exampleInputPassword1" class="form-label w-100">End Date</label>
                <input class="form-select form-control" type="datetime-local" name="searchEndDate"></input>
            </div> --}}
            <div class="m-3 w-25">
                <button type="submit" class="btn btn-filter btn-primary w-25">Find</button>
                <a href="{{ route('addProductForm') }}" class="btn btn-primary bg-success ms-3">Add new</a>
            </div>
        </form>
        <!-- Modal -->
        @include('subForm.addProductDropDownBox')
        <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm scrolling-table" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th class="th-sm">ID</th>
                    <th>Image</th>
                    <th class="th-sm">Barcode</th>
                    <th class="th-sm">Product Name</th>
                    <th class="th-sm">Part Number</th>
                    <th class="th-sm">Specifications</th>
                    <th class="th-sm">Description</th>
                    <th class="th-sm">Price</th>
                    <th class="th-sm">Discount</th>
                    <th class="th-sm">Warranty</th>
                    <th class="th-sm">Sub Category</th>
                    <th class="th-sm">Brand</th>
                    <th class="th-sm" class="text-center">Option</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($products))
                    @foreach ($products as $key => $s)
                        <tr id="data-row-{{ $s->id }}">
                            <th class="row-id" scope="row">{{ $s->id }}</th>
                            <td class="row-image dropdown">
                                <a class="btn btn-secondary btn-sm btn-img-view" data-target="#exampleModal2"
                                    data-toggle="modal"
                                    img-link="@if ($s->product_img != null) @foreach ($s->product_img as $k){{ $k->imageUrl }}|@endforeach @endif">
                                    <i class="fa-solid fa-image" style="margin-right: 5px"></i>View
                                </a>
                            </td>
                            <td class="row-barcode">{{ $s->barcode }}</td>
                            <td class="row-productName" data-value="{{ $s->productName }}">
                                {{ Str::limit($s->productName, 20, ' ...') }}</td>
                            <td class="row-partNumber">{{ $s->partNumber }}</td>
                            <td class="row-specifications" data-value="{{ $s->specifications }}">
                                {{ Str::limit($s->specifications, 20, ' ...') }}</td>
                            <td class="row-description" data-value="{{ $s->description }}">
                                {{ Str::limit($s->description, 20, ' ...') }}</td>
                            <td class="row-price">$<span>{{ $s->price }}</span></td>
                            <td class="row-discount">{{ $s->discount }}</td>
                            <td class="row-warranty">{{ $s->warranty }}</td>
                            <td class="row-subCategoryId">{{ $s->subCategoryId }}</td>
                            <td class="row-brand">{{ $s->brand }}</td>
                            <td class="d-flex justify-content-center">
                                <a data-id="{{ $s->id }}" href="productx" class="btn btn-edit btn-warning btn-sm"
                                    data-target="#exampleModal" data-toggle="modal">Edit</a>
                                {{-- <form action="{{ route('delPdt', ['id' => $s->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-delete btn-danger btn-sm ms-1">Remove</button>
                                </form> --}}
                                <button data-id="{{ $s->id }}" type="button"
                                    class="btn btn-delete btn-danger btn-sm ms-1" data-toggle="modal"
                                    data-target="#exampleModal3">
                                    Remove
                                </button>
                                {{-- <a href="{{ route('delPdt', ['id' => $s->id]) }}" class="btn btn-delete btn-danger btn-sm ms-1">Remove</a> --}}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/products.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

                // Make AJAX request
                $.ajax({
                    url: '{{ route('getSubCategByMain') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'mainCategoryId': mainCategoryId
                    },
                    success: function(response) {
                        var selectTag = '<option value="0">None</option>';
                        response.forEach(s => {
                            selectTag += `<option value="${s.id}">${s.categoryName}</option>`;
                        });
                        $('[name="searchSubCategory"]').html(selectTag);
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            });
    </script>
@endsection
