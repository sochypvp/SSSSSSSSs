@include('modalForm.categoryDeleteConfirmBox')
<form action="{{ route('addSubCategory') }}" class="d-flex w-100" method="POST">
    @csrf
    <div class="m-3 d-flex align-items-start">
        <input required type="text" class="m-1 form-control" placeholder="Category Name" name="categoryName">
        <select name="mainCategoryId" id="" class="form-select m-1">
            @isset($mainCateg)
                @foreach ($mainCateg[1] as $s)
                    <option value="{{ $s->id }}">{{ $s->id }}-{{ $s->categoryName }}</option>
                @endforeach
            @endisset
        </select>
        <button class="m-1 btn btn-primary" type="submit">Add</button>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Category Name</th>
            <th class="text-center" style="min-width: 170px" scope="col">Total Products</th>
            <th scope="col" class="text-end">Options</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($subCateg))
            @foreach ($subCateg[1] as $s)
                <tr>
                    <th id="id" scope="row">{{ $s->id }}</th>
                    <td id="categoryName">{{ $s->categoryName }}</td>
                    <td class="text-center" id="created_at">{{ $s->totalProducts }}</td>
                    <td class="text-end">
                        <button class="btn btn-outline-primary btn-sm">Edit</button>
                        <button id="btn-remove" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                        data-target="#exampleModal3">Remove</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

