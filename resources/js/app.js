require('./bootstrap');


$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.product-decrease, .product-increase').on('click', function(){
    var id = $(this).attr('data-id');
    var adet = $(this).attr('data-adet');
    $.ajax({
        type:'PATCH',
        url:'/sepet/guncelle/'+ id,
        data: {adet : adet},
        success: function(result){
            window.location.href='/sepet';
        }

    });
});
