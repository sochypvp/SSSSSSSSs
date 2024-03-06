@extends('home')

@section('content')
    <style>
        a {
            text-decoration: none
        }
        .container i {
            margin-right: 10px
        }
        .container .form-control {
            background-color: #ecececc2
        }
    </style>
    <div class="container p-2 w-100 h-100 d-flex pt-3">
        <div class="m-3 w-25 d-flex flex-column align-items-center">
            <a
                class="container m-1 bg-danger bg-gradient rounded-2 w-30 h-25 d-flex flex-column align-items-center justify-content-center position-relative">
                <h3 class="m-2 text-white position-absolute" style="top: 0"><i class="fa-solid fa-layer-group"></i>Categories</h3>
                <h1 class="m-3 text-white"> @if (isset($mainCateg)) {{ $mainCateg[0] }} @endif</h1>
            </a>
            <div class="w-100">
                <select class="form-select form-control" name="brand">
                    <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}>None</option>
                    @if (isset($mainCateg))
                        @foreach ($mainCateg[1] as $s)
                            <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}>{{ $s->id,$s->categoryName }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="m-3 w-25 d-flex flex-column align-items-center">
            <a
                class="container m-1 bg-success bg-gradient rounded-2 w-30 h-25 d-flex flex-column align-items-center justify-content-center position-relative">
                <h3 class="m-2 text-white position-absolute" style="top: 0"><i class="fa-solid fa-list"></i>Sub Categories</h3>
                <h1 class="m-3 text-white">@if (isset($subCateg)) {{ $subCateg[0] }} @endif</h1>
            </a>
            <div class="w-100">
                <select class="form-select form-control" name="brand">
                    <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}>None</option>
                    @if (isset($subCateg))
                        @foreach ($subCateg[1] as $s)
                            <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}>{{ $s->categoryName }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="m-3 w-25  d-flex flex-column align-items-center">
            <a
                class="container m-1 bg-warning bg-gradient rounded-2 w-30 h-25 d-flex flex-column align-items-center justify-content-center position-relative">
                <h3 class="m-2 text-white position-absolute" style="top: 0"><i class="fa-solid fa-server"></i>Brands</h3>
                <h1 class="m-3 text-white">@if (isset($brand)) {{ $brand[0] }} @endif</h1>
            </a>
            <div class="w-100">
                <select class="form-select form-control" name="brand">
                    <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}>None</option>
                    @if (isset($brand))
                        @foreach ($brand[1] as $s)
                            <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}>{{ $s->brandName }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="m-3 w-25 d-flex flex-column align-items-center">
            <a href="{{ route('product') }}"
                class="container m-1 bg-info bg-gradient rounded-2 w-30 h-25 d-flex flex-column align-items-center justify-content-center position-relative">
                <h3 class="m-2 text-white position-absolute" style="top: 0"><i class="fa-solid fa-cart-shopping"></i>Products</h3>
                <h1 class="m-3 text-white">35</h1>
            </a>
        </div>

    </div>
@endsection
