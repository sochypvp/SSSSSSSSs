@extends('home')

@section('content')

    <div class="conatiner w-100">
        <form class="d-flex w-100 h-25 align-items-end justify-content-around">
            <div class="m-3 w-25 ">
                <label for="exampleInputEmail1" class="form-label w-100">Main Categoires</label>
                <select class="form-select form-control">
                    @if (isset($mainCategories))
                        @foreach ($mainCategories as $s)
                            <option value="{{$s->id}}">{{ $s->categoryName }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="m-3 w-25">
                <label for="exampleInputPassword1" class="form-label w-100">Sub Categoires</label>
                <select class="form-select form-control">
                    @if (isset($subCategories))
                        @foreach ($subCategories as $s)
                            <option value="h">{{ $s->categoryName }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="m-3 w-25">
                <label for="exampleInputPassword1" class="form-label w-100">Date</label>
                <input class="form-select form-control" type="datetime-local"></input>
            </div>
            <div class="m-3 w-25">
                <label for="exampleInputPassword1" class="form-label w-100">Date</label>
                <input class="form-select form-control" type="datetime-local"></input>
            </div>
            <div class="m-3 w-25">
                <button type="submit" class="btn btn-primary w-25">Find</button>
                <a class="btn btn-primary bg-success ms-3" data-target="#exampleModal" data-toggle="modal">Add new</a>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th>Image</th>
                    <th scope="col">Barcode</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Part Number</th>
                    <th scope="col">Specifications</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Warranty</th>
                    <th scope="col">Sub Category</th>
                    <th scope="col">Brand</th>
                    <th scope="col" class="text-center">Option</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($products))
                    @foreach ($products as $s)
                        <tr>
                            <th scope="row">{{ $s->id }}</th>
                            @if(isset($pdImage))
                                <td><img width="30px" src="" alt=""></td>
                            @endif
                            <td>{{ $s->barcode }}</td>
                            <td>{{ $s->productName }}</td>
                            <td>{{ $s->partNumber }}</td>
                            <td>{{ $s->specifications }}</td>
                            <td>{{ $s->description }}</td>
                            <td>{{ $s->price }}</td>
                            <td>{{ $s->discount }}</td>
                            <td>{{ $s->warranty }}</td>
                            <td>{{ $s->subCategoryId }}</td>
                            <td>{{ $s->brand }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm ms-1">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
