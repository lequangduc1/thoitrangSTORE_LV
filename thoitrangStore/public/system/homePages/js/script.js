$(document).ready(function(){
    $('.filter__option').on('click',function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
        }else{
            $(this).addClass('active');
        }
        filter();
    })

})

function addQuality(productId){

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
        const productItem = productWrapper[i].getElementsByClassName('product-item');

        const dataColor = productItem[0].getAttribute('data-color');
        const dataSize = productItem[0].getAttribute('data-size');

        if(color.length > 0 || size.length > 0){
            if(color.indexOf(dataColor) >= 0 || size.indexOf((dataSize)) >= 0 ){
                productWrapper[i].style.display = "";
            }
            if(color.indexOf(dataColor) == -1 && size.indexOf((dataSize)) == -1 ){
                productWrapper[i].style.display = "none";
            }
        }else{
            productWrapper[i].style.display = "";
        }



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
                $('#price_sale').html(formatCurrent(sale));
                $('#sale_code').val('');
                $('#price_left').html(formatCurrent(total-sale));
                $('#order_code').val(code);
                $('#code-sale-wrapper').html(
                    `<div class="code_sale_apply">
                    <span>Mã hợp lệ Giảm ${res.phantramgiam} %</span>
                    <a class="del-goods" onclick="hanleDestroyCodeSale(`+total+`)">&nbsp;
                    </a>
                </div>`
                )
            }else{
                $('#code-sale-wrapper').html(
                    `<div class="code_sale_apply_error">
                    <span>Mã không hợp lệ hoặc hết hạn</span>
                    <a class="del-goods" onclick="hanleDestroyCodeSale(`+total+`)">&nbsp;
                    </a>
                </div>`
                )
            }
        }
    })
}

function hanleDestroyCodeSale(total){
    $('#price_sale').html(formatCurrent(0));
    $('#price_left').html(formatCurrent(total));
    $('#order_code').val('');
    $('#code-sale-wrapper').html(
        `<div class="input-group mb-3" id="input_code_sale">
            <input
                type="text"
                class="form-control"
                placeholder="Mã giảm giá"
                id="sale_code"
                aria-label="Recipient's username"
                aria-describedby="button-addon2">
            <button
                class="btn btn-outline-secondary"
                type="button"
                onclick="handleApplySale(`+total+`)"
                id="btn-apply">Áp dụng</button>
        </div>`
    )
}

function formatCurrent(number){
    return number.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
}


