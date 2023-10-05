<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $eventOn_url = "https://intheluuup.com/wp-json/eventon/events";
    # Structure of each event 
    # Each event has: 
    # name, permalink, start, end, and details.
    $json_data = file_get_contents($eventOn_url);
    $response_data = json_decode($json_data);
    $event_data = $response_data->events;

    foreach($event_data as $event){
        $event_name = isset($event->name) ? $event->name : 'Event Name Not Available';
        $event_permalink = isset($event->permalink) ? $event->permalink : 'Permalink Not Available';
        $event_start = isset($event->start) ? date('Y-m-d H:i:s', $event->start) : 'Start Date Not Available';
        $event_details = isset($event->details) ? $event->details : 'Event Details Not Available';
        $event_end = isset($event->end) ? date('Y-m-d H:i:s', $event->end) : 'End Date Not Available';
        $message = "<br>{$event_permalink}<br>{$event_name}<br>Start Date: {$event_start}<br>End Date: {$event_end}<br>{$event_details}<br>";
        print_r($message);
    };

        /*
        $post_data = array(
            'message' => $message,
            'access_token' => $access_token
        );
        // Initialize cURL session
        $ch = curl_init('https://graph.facebook.com/me/feed');

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        // Execute the cURL request
        $result = curl_exec($ch);

        // Check for errors or handle the result as needed
        if ($result === false) {
            echo "Error posting to Facebook: " . curl_error($ch);
        } else {
            echo "Posted event to Facebook successfully!";
        }

        // Close cURL session
        curl_close($ch);
        */
    
    ?>
</body>
</html>