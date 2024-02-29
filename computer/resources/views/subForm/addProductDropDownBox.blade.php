<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bars-progress"
                        style="margin-right: 10px;"></i>Management</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="frm_data" action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-box w-100 d-flex">
                        <div class="left-bar w-50 d-flex flex-column justify-content-between">
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Image</label>
                                <input class="form-select form-control" type="file" name="image"></input>
                            </div>
                            <div class="m-3 w-90 d-flex flex-wrap justify-content-center">
                                <img height="100px"
                                    src="https://shuttershopegypt.com/wp-content/uploads/2023/04/Microsoft-Surface-Laptop-4-i7.webp2_.webp"
                                    alt="">
                                <img height="100px"
                                    src="https://shuttershopegypt.com/wp-content/uploads/2023/04/Microsoft-Surface-Laptop-4-i7.webp2_.webp"
                                    alt="">
                                <img height="100px"
                                    src="https://shuttershopegypt.com/wp-content/uploads/2023/04/Microsoft-Surface-Laptop-4-i7.webp2_.webp"
                                    alt="">
                                <img height="100px"
                                    src="https://shuttershopegypt.com/wp-content/uploads/2023/04/Microsoft-Surface-Laptop-4-i7.webp2_.webp"
                                    alt="">
                                <img height="100px"
                                    src="https://shuttershopegypt.com/wp-content/uploads/2023/04/Microsoft-Surface-Laptop-4-i7.webp2_.webp"
                                    alt="">
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Barcode</label>
                                <input class="form-input form-control" type="text" name="barcode"></input>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Product
                                    Name</label>
                                <input class="form-input form-control" type="text" name="productName"></input>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Part
                                    Number</label>
                                <input class="form-input form-control" type="text" name="partNumber"></input>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Specifications</label>
                                <textarea name="specifications" id="prg_content" class="w-100" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="right-bar w-50 d-flex flex-column justify-content-between">
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Price</label>
                                <input class="form-input form-control" type="number" name="price"></input>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Discount</label>
                                <input class="form-input form-control" type="number" name="discount"></input>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Warranty</label>
                                <input class="form-input form-control" type="text" name="warranty"></input>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Sub
                                    Categoires</label>
                                <select class="form-select form-control" name="subCategoryId">
                                    @if (isset($subCategories))
                                        @foreach ($subCategories as $s)
                                            <option value="{{ $s->id }}">{{ $s->categoryName }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Brand</label>
                                <select class="form-select form-control" name="brand">
                                    @if (isset($subCategories))
                                        @foreach ($subCategories as $s)
                                            <option value="{{ $s->id }}">{{ $s->categoryName }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Description</label>
                                <textarea name="description" id="myeditorinstance" class="w-100" rows="10">Hello, World!</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="submit-group m-3 w-90 d-flex justify-content-end">
                        <button id="btn-update-submit" class="btn btn-info mybtn-green" name="submit">Add</button>
                    </div>
                </form>
                <div class="view-modal-content">

                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
