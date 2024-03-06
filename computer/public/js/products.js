$(document).ready(function () {

    $.showImg = function () {
        $('.btn-img-view').click(function () {
            var imgUrl = $(this).attr('img-link');
            var imgTag = "";
            var imgRealUrl = imgUrl.split('|');
            for (var i = 0; i < imgRealUrl.length - 1; i++) {
                imgTag +=
                    `<img class="w-25 m-2" src="${imgRealUrl[i]}" alt="">`;
            }

            $('.img-content-box').html(imgTag);
        });
    }
    $.showImg();

    $('.btn-delete').click(function (e) {
        var dataId = $(this).attr('data-id');
        $('#exampleModal3 .modal-body').html(
            `<a href='/deleteProduct/${dataId}' class="btn btn-delete btn-danger btn-sm ms-1">Remove</a>` +
            `<a class="btn btn-delete btn-primary btn-sm ms-1" data-dismiss="modal" aria-label="Close">Cancel</a>`
        );
    });

    $('.btn-edit').click(function () {
        var dataId = $(this).attr('data-id');
        var dataRow = $(`#data-row-${dataId}`);
        var data = {
            id: dataRow.find(`.row-id`).html(),
            image: dataRow.find(`.row-image a`).attr('img-link'),
            barcode: dataRow.find(`.row-barcode`).html(),
            productName: dataRow.find(`.row-productName`).data('value'),
            partNumber: dataRow.find(`.row-partNumber`).html(),
            specifications: dataRow.find(`.row-specifications`).data('value'),
            description: dataRow.find(`.row-description`).data('value'),
            price: dataRow.find(`.row-price span`).html(),
            discount: dataRow.find(`.row-discount`).html(),
            warranty: dataRow.find(`.row-warranty`).html(),
            subCategoryId: dataRow.find(`.row-subCategoryId`).html(),
            brand: dataRow.find(`.row-brand`).html(),
        }
        console.log(data);
        var formEdit = $('.frm_data');
        formEdit.find('[name="id"]').val(data.id);
        formEdit.find('[name="barcode"]').val(data.barcode);
        formEdit.find('[name="productName"]').val(data.productName);
        formEdit.find('[name="partNumber"]').val(data.partNumber);
        formEdit.find('[name="price"]').val(data.price);
        formEdit.find('[name="discount"]').val(parseInt(data.discount));
        formEdit.find('[name="warranty"]').val(data.warranty);
        formEdit.find('[name="subCategoryId"]').val(data.subCategoryId);
        formEdit.find('[name="brand"]').val(data.brand);
        formEdit.find('[name="specifications"]').val(data.specifications);
        formEdit.find('[name="image"]').val(data.image);
        formEdit.find('[name="description"]').val(data.description);

        var imgTag = "";
        var imgRealUrl = data.image.split('|');
        for (var i = 0; i < imgRealUrl.length - 1; i++) {
            imgTag +=
                `<img class="w-25 m-2" src="${imgRealUrl[i]}" alt="">`;
        }
        $('.image-box').html(imgTag);
    });


    $.limitString = function (string, limit, end = '...') {
        if (string.length > limit) {
            return string.substring(0, limit - end.length) + end;
        } else {
            return string;
        }
    }


});
