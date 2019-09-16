<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>优惠券</title>
</head>
<body>
<input type="button" value="抢券" id="quan">
</body>
</html>
<script src="/js/jquery-3.2.1.min.js"></script>
<script>
    $(function () {
        $("#quan").click(function () {
            var url="/coupon/add";
            $.ajax({
                url:url,
                dataType:"json",
                method:"POST",
                success:function (res) {
                    console.log(res);
                }
            });
        })
    })
</script>