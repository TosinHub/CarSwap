<?php
function SendLoftyMessageSimple()
{
    $username = 'username';
    $password = 'password';
    $sender = 'Sender';
    $recipient = '08068506757';//The recipient could be multiple separated by comma
    $message = urlencode('This is the message yo want to send');
    $ApiLink = 'https://api.loftysms.com/simple/sendsms?username=' . $username . '&password=' . $password . '&sender=' . $sender . '&recipient=' . $recipient . '&message=' . $message . '';
    $response = file_get_contents($ApiLink);
    if(strpos($response,'OK')){
        //Message was submitted successfully
        
    }else{
        //An error has occured
        echo $response;
    }
}