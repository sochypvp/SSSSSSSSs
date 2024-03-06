<form action="" class="d-flex w-100">
    <div class="m-3 d-flex align-items-start">
        <input type="text" class="m-1 form-control" placeholder="Category Name">
        <input type="text" class="m-1 form-control" placeholder="Icons">
        <button class="m-1 btn btn-primary" type="submit">Add</button>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Category Name</th>
            <th scope="col">Icons</th>
            <th scope="col">Created Date</th>
            <th scope="col">Updated Date</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($mainCateg))
            @foreach ($mainCateg[1] as $s)
                <tr>
                    <th scope="row">{{ $s->id }}</th>
                    <td>{{ $s->categoryName }}</td>
                    <td><?php echo $s->icon ?></td>
                    <td>{{ $s->created_at }}</td>
                    <td>{{ $s->updated_at }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
