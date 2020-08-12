$("#cart_add").click(function(e){
    var gid = ($(this).attr('data-gid'))
    $.ajax({
        url: '/cart/add?id=' + gid,
        type: 'get',
        dataType: 'json',
        success:function(d){
            console.log(d);
        }
    });
});
