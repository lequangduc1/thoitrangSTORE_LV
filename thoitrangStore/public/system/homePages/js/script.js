$(document).ready(function(){
    $('.filter__option').on('click',function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
        }else{
            $(this).addClass('active');
        }
        filter();
    })

    $('#product__list__search').on('keyup', function(){
        let word = $(this).val();
        word = conventTitleToSLug(word);

        search(word)

    })
})

function addQuality(productId){

}

function search(word){
    var productList = document.querySelector('.product-list');
    var productWrapper = productList.getElementsByClassName('product-wrapper');

    for( i=0; i<productWrapper.length; i++){
        const productItem = productWrapper[i].querySelector('.product-item');
        let productName = productItem.getAttribute('data-productname');
        productName = conventTitleToSLug(productName);
        if(productName.indexOf(word) >= 0){
            productItem.parentElement.style.display = "";
        }else{
            productItem.parentElement.style.display = 'none';
        }
    }
}

function filter(){
    var i;
    const activeColor = $('.filter__color.active');
    const activeSize = $('.filter__size.active');

    const color = [];
    const size = [];
    for( i=0; i<activeColor.length; i++){
        color.push((activeColor[i].getAttribute('data-color')));
    }
    for( i=0; i<activeSize.length; i++){
        size.push((activeSize[i].getAttribute('data-size')));
    }

    var productList = document.querySelector('.product-list');
    var productWrapper = productList.getElementsByClassName('product-wrapper');
    for( i=0; i<productWrapper.length; i++){
        const productItem = productWrapper[i].querySelector('.product-item');
        const productId = productItem.getAttribute('data-product');
        $.ajax({
            type: "GET",
            url: '/product/filter',
            data:{
                product_id: productId
            },
            success: (res)=>{
                if(res){
                    const dataSize = [];
                    const dataColor = [];
                    dataColor.push(...res[0]);
                    dataSize.push(...res[1]);
                    console.log(color);
                    if(color.length > 0 || size.length > 0){
                        if(check_in_array(color, dataColor) || check_in_array(size, dataSize) ){
                            productItem.parentElement.style.display = "";
                        }
                        if(!check_in_array(color, dataColor) && !check_in_array(size, dataSize) ){
                            productItem.parentElement.style.display = "none";
                        }
                    }else{
                        productItem.parentElement.style.display = "";
                    }
                }
            }

        })

    }

}

function handleApplySale(total){
    const code = $('#sale_code').val();
    $.ajax({
        type: 'GET',
        url: '/order/check-code-sale/'+code,
        success: (res) => {
            if(res){
                const sale = (total*res.phantramgiam)/100;
                $('#price_sale').html(formatCurrency(sale));
                $('#sale_code').val('');
                $('#price_left').html(formatCurrency(total-sale));
                $('#order_code').val(code);
                $('#code-sale-wrapper').html(
                    `<div class="code_sale_apply">
                    <span>M?? h???p l??? Gi???m ${res.phantramgiam} %</span>
                    <a class="del-goods" onclick="hanleDestroyCodeSale(`+total+`)">&nbsp;
                    </a>
                </div>`
                )
            }else{
                $('#code-sale-wrapper').html(
                    `<div class="code_sale_apply_error">
                    <span>M?? kh??ng h???p l??? ho???c h???t h???n</span>
                    <a class="del-goods" onclick="hanleDestroyCodeSale(`+total+`)">&nbsp;
                    </a>
                </div>`
                )
            }
        }
    })
}

function hanleDestroyCodeSale(total){
    $('#price_sale').html(formatCurrency(0));
    $('#price_left').html(formatCurrency(total));
    $('#order_code').val('');
    $('#code-sale-wrapper').html(
        `<div class="input-group mb-3" id="input_code_sale">
            <input
                type="text"
                class="form-control"
                placeholder="M?? gi???m gi??"
                id="sale_code"
                aria-label="Recipient's username"
                aria-describedby="button-addon2">
            <button
                class="btn btn-outline-secondary"
                type="button"
                onclick="handleApplySale(`+total+`)"
                id="btn-apply">??p d???ng</button>
        </div>`
    )
}


function hanleChangeOptionProductDetail(productId){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {
            _token: csrf_token,
            product_id: productId
        },
        url: '/product/filter-option',
        success: (res) => {
            if(res){
                $('#product_left_text').html('<span id="product_left_text">C??n l???i ('+res.productDetail.soluong+')</span>')
                $('#product_detail_img').attr('src', '/' + res.productDetail.anhsanpham);
                $('#product__page__cart__form').attr('action', '/cart/'+res.productDetail.id)
                $(".zoomImg").attr(
                    "src",
                    "/" + res.productDetail.anhsanpham
                );
                $('#product_detail_price').html(formatCurrency(res.productDetail.giasanpham));

                let html1 = 'Size: ';
                let html2 = "Size: ";
                let listsize = [];
                for (const product of res.productDetail.sanphams.chitiet) {
                    if (!listsize.includes(product.idsize)) {
                        listsize.push(product.idsize);
                        html1 += `
                        <button
                        class="btn btn-secondary"
                        ${product.id == res.productDetail.id ? "disabled" : ""}
                        onclick="hanleChangeOptionProductDetail(${product.id})">
                            ${product.tensize}
                        </button>
                        `;
                    }
                    if (product.idsize == res.productDetail.idsize)
                        html2 += `<button ${
                            product.id == res.productDetail.id ? "disabled" : ""
                        }  class="color__button"
                        style="background-color: ${product.code}"
                        onclick="hanleChangeOptionProductDetail(${product.id})"
                        >
                        </button>`;

                }


                $('#size_detail').html(html1);

                $('#color_detail').html(html2);

                let html3 = `Size: <strong>${res.tensize}</strong><br>
                                    Color: <strong style="color: ${res.code}"> In Stock</strong>`;
                $('#status_detail').html(html3);
            }
        }
    })

}


function formatCurrency(number){
    number = parseInt(number);
    return number.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
}


function getProductInformation(productId, type, productKey) {
    var csrf_token = $('meta[name="csrf-token"]').attr("content");
    if (type == "size") {
        var img_id = "img_" + productKey;
        var size_id = "size_" + productKey;
        var color_id = "color_" + productKey;
        var price_id = "price_" + productKey;
        var link_id = "link_"+ productKey;
        var keyProduct = productKey;
        $.ajax({
            url: "/product_detail/" + productId,
            method: "POST",
            data: {
                _token: csrf_token,
                id: productId,
            },
        }).done((data) => {
            console.log(data);
            $(`#${link_id}`).attr('href', '/cart/'+data.product.id);
            $("#" + img_id).attr("src", data.product.anhsanpham);
            let price = formatCurrency(data.product.giasanpham);
            $("#" + price_id).html(price);
            let html1 = "Size: ";
            let listSize = [];
            for (let item of data.listDetailProduct) {
                if (!listSize.includes(item.idsize)) {
                    console.log("aa")
                    html1 += `<button class="btn btn-secondary"
                    ${data.product.idsize == item.idsize ? "disabled" : ""}
                    onclick="getProductInformation(${
                        item.id
                    }, 'size', ${keyProduct})">${item.tensize}
                    </button>`;
                    listSize.push(item.idsize);
                }


            }
            $("#" + size_id).html(html1);

            let html2 = "Color: ";
            for (let item of data.listDetailProduct) {
                html2 +=
                    item.idsize == data.product.idsize
                        ? `<button ${
                              data.product.idmau == item.idmau ? "disabled" : ""
                          }
                            onclick="getProductInformation(${
                                item.id
                            }, 'color', ${keyProduct})"
                            style="background-color: ${item.code}"
                                            class="color__button"> </button>`
                        : "";
            }
            $("#" + color_id).html(html2);
        });
    } else if (type == "color") {
        var img_id = "img_" + productKey;
        var color_id = "color_" + productKey;
        var price_id = "price_" + productKey;
        var link_id = "link_"+ productKey;
        var keyProduct = productKey;
        $.ajax({
            url: "/product_detail/" + productId,
            method: "POST",
            data: {
                _token: csrf_token,
                id: productId,
            },
        }).done((data) => {
            $("#" + img_id).attr("src", data.product.anhsanpham);
            $(`#${link_id}`).attr('href', '/cart/'+data.product.id);
            let price = formatCurrency(data.product.giasanpham);
            $("#" + price_id).html(price);

            let html = "Color: ";
            for (let item of data.listDetailProduct) {
                html +=
                    item.idsize == data.product.idsize
                        ? `<button
                            ${
                                data.product.idmau == item.idmau
                                    ? "disabled"
                                    : ""
                            }
                            onclick="getProductInformation(${
                                item.id
                            }, 'color', ${keyProduct})"
                            style="background-color: ${item.code}"
                                            class="color__button"> </button>`
                        : "";
            }
            $("#" + color_id).html(html);

        });
    }
}
function getNewProductInformation(productId, type, productKey) {
    var csrf_token = $('meta[name="csrf-token"]').attr("content");
    if (type == "size") {
        var img_id = "img_new" + productKey;
        var size_id = "size_new" + productKey;
        var color_id = "color_new" + productKey;
        var price_id = "price_new" + productKey;
        var link_id = "link_new" + productKey;
        var keyProduct = productKey;
        $.ajax({
            url: "/product_detail/" + productId,
            method: "POST",
            data: {
                _token: csrf_token,
                id: productId,
            },
        }).done((data) => {
            $(`#${link_id}`).attr("href", "/cart/" + data.product.id);
            $("#" + img_id).attr("src", data.product.anhsanpham);
            let price = formatCurrency(data.product.giasanpham);
            $("#" + price_id).html(price);
            let html1 = "Size: ";
            let listSize = [];
            for (let item of data.listDetailProduct) {
                if (!listSize.includes(item.idsize)) {
                    listSize.push(item.idsize);
                        html1 += `<button class="btn btn-secondary"
                    ${data.product.idsize == item.idsize ? "disabled" : ""}
                    onclick="getNewProductInformation(${item.id
                            }, 'size', ${keyProduct})">${item.tensize}
                    </button>`;
                }
            }
            $("#" + size_id).html(html1);

            let html2 = "Color: ";
            for (let item of data.listDetailProduct) {
                html2 +=
                    item.idsize == data.product.idsize
                        ? `<button ${
                              data.product.idmau == item.idmau ? "disabled" : ""
                          }
                            onclick="getNewProductInformation(${
                                item.id
                            }, 'color', ${keyProduct})"
                            style="background-color: ${item.code}"
                                            class="color__button"> </button>`
                        : "";
            }
            $("#" + color_id).html(html2);
        });
    } else if (type == "color") {
        var img_id = "img_new" + productKey;
        var color_id = "color_new" + productKey;
        var price_id = "price_new" + productKey;
        var link_id = "link_new" + productKey;
        var keyProduct = productKey;
        $.ajax({
            url: "/product_detail/" + productId,
            method: "POST",
            data: {
                _token: csrf_token,
                id: productId,
            },
        }).done((data) => {
            $("#" + img_id).attr("src", data.product.anhsanpham);
            $(`#${link_id}`).attr("href", "/cart/" + data.product.id);
            let price = formatCurrency(data.product.giasanpham);
            $("#" + price_id).html(price);

            let html = "Color: ";
            for (let item of data.listDetailProduct) {
                html +=
                    item.idsize == data.product.idsize
                        ? `<button
                            ${
                                data.product.idmau == item.idmau
                                    ? "disabled"
                                    : ""
                            }
                            onclick="getNewProductInformation(${
                                item.id
                            }, 'color', ${keyProduct})"
                            style="background-color: ${item.code}"
                                            class="color__button"> </button>`
                        : "";
            }
            $("#" + color_id).html(html);
        });
    }
}


function check_in_array(array1, array2){
    var isCheck = false;
    for(var i = 0; i < array2.length; i++){
        if(array1.indexOf(array2[i]) >= 0){
            isCheck = true;
        }
    }

    return isCheck;
}

function conventTitleToSLug(str){
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, 'a');
    str = str.replace(/??|??|???|???|???|??|???|???|???|???|???/g, 'e');
    str = str.replace(/??|??|???|???|??/g, 'i');
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, 'o');
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???/g, 'u');
    str = str.replace(/???|??|???|???|???/g, 'y');
    str = str.replace(/??/g, 'd');
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, 'A');
    str = str.replace(/??|??|???|???|???|??|???|???|???|???|???/g, 'E');
    str = str.replace(/??|??|???|???|??/g, 'I');
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, 'O');
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???/g, 'U');
    str = str.replace(/???|??|???|???|???/g, 'Y');
    str = str.replace(/??/g, 'D');
    // Some system encode vietnamese combining accent as individual utf-8 characters
    // M???t v??i b??? encode coi c??c d???u m??, d???u ch??? nh?? m???t k?? t??? ri??ng bi???t n??n th??m hai d??ng n??y
    str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ''); // ?? ?? ?? ?? ??  huy???n, s???c, ng??, h???i, n???ng
    str = str.replace(/\u02C6|\u0306|\u031B/g, ''); // ?? ?? ??  ??, ??, ??, ??, ??
    str = str.replace(/ /g, '-');
    str = str.replace(/[^\w-]+/g, '');
    str = str.toLowerCase();
    return str;
}
