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


