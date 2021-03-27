@if(Session::has('desktopNotification'))
    @php
        function sendMessage() {

            $data = Session::get('desktopNotification');

            $content = array(
                "en" => $data['message']
            );
            $headings = array(
                "en" => $data['title']
            );

            $fields = array(
                'app_id' => "02ee1eb6-82fc-4aa7-9d6a-3615c671f963",
                'included_segments' => array('All'),
                'contents' => $content,
                'headings' => $headings,
                'url' => $data['url'],
            );

            $fields = json_encode($fields);


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Authorization: Basic OWNkNGI0NGMtYzc1ZC00ZmE5LTkzOTUtN2NjZjAwZDk3NmRh'
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            $response = curl_exec($ch);
            curl_close($ch);

            return $response;
        }

        $response = sendMessage();
        $return["allresponses"] = $response;
        $return = json_encode($return);

    @endphp
    @php Session::pull('desktopNotification') @endphp
@endif
