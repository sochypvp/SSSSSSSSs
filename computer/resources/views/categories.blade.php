@extends('home')
@section('content')
    <div class="conatiner p-2 w-100 h-100 d-flex flex-column pt-3">
        @if (Session::has('message') && Session::has('message'))
            <div class="alert {{ Session::get('message') }} alert-dismissible" role="alert">
                {{ Session::get('text') }}
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="header-bar w-100 d-flex">
            <a href="{{ route('categories') }}"
                class="m-1 rounded-1 text-white dashboard-box bg-danger bg-gradient d-flex flex-column align-items-center justify-content-center
                {{ Route::currentRouteName() === 'categories' ? 'border border-5 border-primary border-top-0 border-start-0 border-end-0' : '' }}"
                style="width: 250px;height: 130px;">
                <h5>Total Main Categories</h5>
                <h1>
                    @if (isset($mainCateg))
                        {{ $mainCateg[0] }}
                    @endif
                </h1>
            </a>
            <a href="{{ route('subCateg') }}"
                class="m-1 rounded-1 text-white dashboard-box bg-info bg-gradient d-flex flex-column align-items-center justify-content-center
                {{ Route::currentRouteName() === 'subCateg' ? 'border border-5 border-danger border-top-0 border-start-0 border-end-0' : '' }}"
                style="width: 250px;height: 130px;">
                <h5>Total Sub Categories</h5>
                <h1>
                    @if (isset($subCateg))
                        {{ $subCateg[0] }}
                    @endif
                </h1>
            </a>
            <a href="{{ route('brand') }}" class="m-1 rounded-1 text-white dashboard-box bg-primary bg-gradient d-flex flex-column align-items-center justify-content-center
            {{ Route::currentRouteName() === 'brand' ? 'border border-5 border-danger border-top-0 border-start-0 border-end-0' : '' }}"
                style="width: 250px;height: 130px;">
                <h5>Total Brands</h5>
                <h1>
                    @if (isset($brand))
                        {{ $brand[0] }}
                    @endif
                </h1>
            </a>
        </div>
        @if (Route::currentRouteName() === 'categories')
            @include('categoryForm.mainCategory')
        @endif
        @if (Route::currentRouteName() === 'subCateg')
            @include('categoryForm.subCategory')
        @endif
        @if (Route::currentRouteName() === 'brand')
            @include('categoryForm.brand')
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection
