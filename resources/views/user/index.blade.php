<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/layer/layer.js"></script>
</head>
<body>

<table border="1" rules="all" width="800">
    <tr>
        <td>ID</td>
        <td>用户名</td>
        <td>密码</td>
        <td>操作</td>
    </tr>
    @foreach($user as $u)
    <tr>
        <td>{{$u -> id}}</td>
        <td>{{$u -> name}}</td>
        <td>{{$u -> password}}</td>
        <td><a href="/user/edit/{{$u -> id}}">修改</a>|<a href="javascript:void(0)" onclick="del(this,{{$u -> id}})">删除</a></td>
    </tr>
    @endforeach
</table>

</body>
</html>
<script>
    function del(obj,id){
        layer.confirm('您确定要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("/user/del/" + id,function (data) {
                if(data.status == 0){
                    $(obj).parents('tr').remove();
                    layer.msg(data.msg,{icon:6});
                }
            });
        }, function(){

        });
    }
</script>