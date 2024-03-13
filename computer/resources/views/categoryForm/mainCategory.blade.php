@include('modalForm.categoryDeleteConfirmBox')
<form action="{{ route('addCategory') }}" class="d-flex w-100" method="POST">
    @csrf
    <div class="m-3 d-flex align-items-start">
        <input required type="text" class="m-1 form-control" placeholder="Category Name" name="categoryName">
        <input required type="text" class="m-1 form-control" placeholder="Icons" name="icon">
        <button class="m-1 btn btn-primary" type="submit">Add</button>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Category Name</th>
            <th style="min-width: 200px" scope="col" class="text-center">Icons</th>
            <th style="min-width: 170px" scope="col" class="text-center">Total Sub Category</th>
            <th scope="col" class="text-end">Options</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($mainCateg))
            @foreach ($mainCateg[1] as $s)
                <tr>
                    <th id="id" scope="row">{{ $s->id }}</th>
                    <td id="categoryName">{{ $s->categoryName }}</td>
                    <td id="icon" class="text-center"><?php echo $s->icon ?></td>
                    <td id="totalSubCateg" class="text-center">{{ $s->totalSubCateg }}</td>
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

