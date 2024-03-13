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
            <a style="height: 220px"
                class="container m-1 bg-danger bg-gradient rounded-2 w-30 d-flex flex-column align-items-center justify-content-center position-relative">
                <h3 class="m-2 text-white position-absolute" style="top: 0">Categories</h3>
                <h1 class="m-3 text-white"><i class="fa-solid fa-layer-group"></i> @if (isset($mainCateg)) {{ $mainCateg[0] }} @endif</h1>
            </a>
            {{-- <div class="w-100">
                <select class="form-select form-control" name="main_categories">
                    <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}>None</option>
                    @if (isset($mainCateg))
                        @foreach ($mainCateg[1] as $s)
                            <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}><span>{{ $s->id }}-</span>{{ $s->categoryName }}</option>
                        @endforeach
                    @endif
                </select>
            </div> --}}
        </div>
        <div class="m-3 w-25 d-flex flex-column align-items-center">
            <a style="height: 220px"
                class="container m-1 bg-success bg-gradient rounded-2 w-30 d-flex flex-column align-items-center justify-content-center position-relative">
                <h3 class="m-2 text-white position-absolute" style="top: 0">Sub Categories</h3>
                <h1 class="m-3 text-white"><i class="fa-solid fa-list"></i> @if (isset($subCateg)) {{ $subCateg[0] }} @endif</h1>
            </a>
            {{-- <div class="w-100">
                <select class="form-select form-control" name="sub_categories">
                    <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}>None</option>
                    @if (isset($subCateg))
                        @foreach ($subCateg[1] as $s)
                            <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}><span>{{ $s->id }}-</span>{{ $s->categoryName }}</option>
                        @endforeach
                    @endif
                </select>
            </div> --}}
        </div>
        <div class="m-3 w-25  d-flex flex-column align-items-center">
            <a style="height: 220px"
                class="container m-1 bg-primary bg-gradient rounded-2 w-30 d-flex flex-column align-items-center justify-content-center position-relative">
                <h3 class="m-2 text-white position-absolute" style="top: 0">Brands</h3>
                <h1 class="m-3 text-white"><i class="fa-solid fa-server"></i> @if (isset($brand)) {{ $brand[0] }} @endif</h1>
            </a>
            {{-- <div class="w-100">
                <select class="form-select form-control" name="brand">
                    <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}>None</option>
                    @if (isset($brand))
                        @foreach ($brand[1] as $s)
                            <option value="0" {{ old('brand') == '0' ? 'selected' : '' }}><span>{{ $s->id }}-</span>{{ $s->brandName }}</option>
                        @endforeach
                    @endif
                </select>
            </div> --}}
        </div>
        <div class="m-3 w-25 d-flex flex-column align-items-center">
            <a href="{{ route('product') }}" style="height: 220px"
                class="container m-1 bg-info bg-gradient rounded-2 w-30 d-flex flex-column align-items-center justify-content-center position-relative">
                <h3 class="m-2 text-white position-absolute" style="top: 0">Products</h3>
                <h1 class="m-3 text-white"><i class="fa-solid fa-cart-shopping"></i> {{ $product[0] }}</h1>
            </a>
        </div>

    </div>
@endsection
