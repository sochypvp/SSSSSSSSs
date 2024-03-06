@extends('home')
@section('content')
    <div class="conatiner p-2 w-100 h-100 d-flex flex-column pt-3">
        <div class="header-bar w-100 d-flex">
            <a href="{{ route('categories') }}" class="m-1 rounded-1 text-white dashboard-box bg-danger bg-gradient d-flex flex-column align-items-center justify-content-center" style="width: 250px;height: 130px;">
                <h5>Total Main Categories</h5>
                <h1>@if (isset($mainCateg)) {{ $mainCateg[0] }} @endif</h1>
            </a>
            <a href="{{ route('subCateg') }}" class="m-1 rounded-1 text-white dashboard-box bg-info bg-gradient d-flex flex-column align-items-center justify-content-center" style="width: 250px;height: 130px;">
                <h5>Total Sub Categories</h5>
                <h1>57</h1>
            </a>
            <a class="m-1 rounded-1 text-white dashboard-box bg-primary bg-gradient d-flex flex-column align-items-center justify-content-center" style="width: 250px;height: 130px;">
                <h5>Total Brands</h5>
                <h1>57</h1>
            </a>
        </div>
        @if(Route::currentRouteName() === 'categories')
            @include('categoryForm.mainCategory')
        @endif
        @if (Route::currentRouteName() === 'subCateg')
            cdcgd
        @endif
    </div>
@endsection
