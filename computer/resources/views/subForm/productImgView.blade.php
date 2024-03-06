<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog"
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
                    <div class="img-content-box d-flex flex-wrap justify-content-center">
                        {{-- For img --}}
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
