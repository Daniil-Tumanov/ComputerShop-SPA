function addToCart(id){
    console.log('add ' + id);
    $.ajax({
        async: false,			
        type: "POST",
        url: "ajax/cart.php",
        dataType:"text",
        data: 'action=add&id=' + id,
        error: function () {	
            alert( "Произошла ошибка при добавлении товара" );
        },
        success: function (response) {
            alert('Товар добавлен в корзину');
        }
    });
}

function showMyCart(){
    console.log('show ');
    $.ajax({
        async: false,
        type: "POST",
        url: "ajax/cart.php",
        data: "action=show",
        dataType:"text",
        error: function () {	
            alert( "Произошла ошибка при отрисовке корзины" );
        },
        success: function (response) {
            $('#in-check').html(response);
        }
    });
}

function delFromCart(id){
    console.log('del ' + id);
    $.ajax({
        async: false,
        type: "POST",
        url: "ajax/cart.php",
        data: 'action=del&id=' + id,
        dataType:"text",
        error: function () {	
            alert( "Произошла ошибка при удалении товара" );
        },
        success: function (response) {
            showMyCart();
            console.log(response);
        }
    });
}
