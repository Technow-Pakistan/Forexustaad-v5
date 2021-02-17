
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script src="{{URL::to('/public/assets/assets/js/jquery-3.2.1.min.js')}}"></script>
</head>
<body>
    
<script>
$(document).ready(function () {
    $('#btnGetIpDetail').click(function () {
        if ($('#txtIP').val() == '') {
            alert('IP address is reqired');
            return false;
        }
        $.getJSON("http://ip-api.io/3/json" + $('#9.63.29.92').val(),
                function (result) {
                    alert('City Name: ' + result.city)
                    console.log(result);
                });
    });
});
</script>
</body>
</html>