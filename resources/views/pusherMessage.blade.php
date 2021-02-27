<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listening my message</h1>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}", {
      cluster: "{{env('PUSHER_APP_CLUSTER')}}"
    });

    var channel = pusher.subscribe("{{$channel}}");
    channel.bind("{{$event}}", function(data) {
      console.log((data));
    });
  </script>
</body>
</html>