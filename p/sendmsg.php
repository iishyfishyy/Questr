<!doctype html>

<html>
    <head>
    <title>SMS sending...</title>
    </head>

    <body>

    <?php
    
    require('Services/Twilio.php');
 
    $AccountSid = 'ACb74d4299723a3ebccc27e6eea4d6ad09'; 
    $AuthToken = '1d49a1996436a6c9aeeab2732ccd6c26'; 
 
    $client = new Services_Twilio($AccountSid, $AuthToken);
 
    echo "Sending message...";

    $number = "+12262602296";

     try {
            $client->account->messages->create(
                [
                    'From' => "+12048179140",
                    'To' => $number,
                    'Body' => "Hey Mishra, someone has volunteered for your posting!"
                //   Unavailable on Canadian phone numbers.
                //  'MediaUrl' => 'http://www.yourserver.com/yourimage.png'
                ]
            );
            print('Message sent to ' . $number);
        }
        catch(Services_Twilio_RestException $e) {
            echo "$e";
        }

    ?>
    
    </body>
</html>

