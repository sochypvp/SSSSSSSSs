<div class='modal fade bd-example-modal-lg @error(['barcode']) ss @enderror' id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bars-progress"
                        style="margin-right: 10px;"></i>Management</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="frm_data" action="{{ route('updateProduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-box w-100 d-flex">
                        <div class="left-bar w-50 d-flex flex-column justify-content-between">
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">ID</label>
                                <input required class="form-input form-control" type="text" name="id"
                                    value="{{ old('id') }}"></input>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Barcode</label>
                                <input required class="form-input form-control" type="text" name="barcode"
                                    value="{{ old('barcode') }}"></input>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Product
                                    Name</label>
                                <input required class="form-input form-control" type="text"
                                    name="productName"></input>
                            </div>
                            <div class="m-3 w-90">
                                <label required for="exampleInputPassword1" class="form-label w-100">Part
                                    Number</label>
                                <input class="form-input form-control" type="text" name="partNumber"></input>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Price</label>
                                <input required class="form-input form-control" type="number" name="price"></input>
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
                                <select required class="form-select form-control" name="subCategoryId">
                                    @if (isset($subCategories))
                                        @foreach ($subCategories as $s)
                                            <option value="{{ $s->id }}">{{ $s->categoryName }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Brand</label>
                                <select required class="form-select form-control" name="brand">
                                    @if (isset($brand))
                                        @foreach ($brand as $s)
                                            <option value="{{ $s->id }}">{{ $s->brandName }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Specifications</label>
                                <textarea name="specifications" id="prg_content" class="w-100" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="right-bar w-50 d-flex flex-column justify-content-between">
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Image
                                    <pre class="text-success">you can add a lot of image URL by add | for split the link </pre>
                                </label>
                                <textarea class="form-input form-control w-100" rows="10" type="text" name="image" id="imageLink"></textarea>
                            </div>
                            <div class="m-3 w-90" style="height: 48vh;">
                                <div class="image-box w-90 d-flex flex-wrap justify-content-center">
                                    {{-- IMAGES --}}
                                </div>
                            </div>
                            <div class="m-3 w-90">
                                <label for="exampleInputPassword1" class="form-label w-100">Description</label>
                                <textarea name="description" id="myeditorinstance" class="w-100" rows="10">Hello, World!</textarea>
                            </div>
                        </div>
                        {{-- ==================================================================== --}}
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
                        </script>
                        <script>
                            $(document).ready(function() {
                                $('#imageLink').change(function () {
                                    var imgUrl = $(this).val();
                                    var newImg = imgUrl.split('|');
                                    var imgTag = '';
                                    newImg.forEach(s => {
                                        imgTag += `<img class="w-25 m-2" src="${s}" alt="">`;
                                    });
                                    $('.image-box').html(imgTag);
                                 })
                            });
                        </script>
                        {{-- ==================================================================== --}}
                    </div>
                    <div class="submit-group m-3 w-90 d-flex justify-content-end">
                        <button id="btn-update-submit" class="btn btn-info mybtn-green" name="submit">Update</button>
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
