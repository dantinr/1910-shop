$("#cart_add").click(function(e){
    var gid = ($(this).attr('data-gid'))
    $.ajax({
        url: '/cart/add?id=' + gid,
        type: 'get',
        dataType: 'json',
        success:function(d){
            console.log(d);
            if(d.errno==0)
            {
                $.MessageBox("已加入购物车");
                var num = $("#cart_num").text();
                num++;      //可根据返回数据修改购物车数量
                $("#cart_num").text(num)
            }
        }
    });
});
