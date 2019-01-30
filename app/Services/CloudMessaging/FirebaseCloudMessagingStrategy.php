<?php

namespace App\Services\CloudMessaging;

use App\Models\Fcm;
use Illuminate\Support\Facades\Auth;

class FirebaseCloudMessagingStrategy implements CloudMessageInterface
{
    public function push(string $title)
    {
       $fcmTokens = $this->getFcmTokens();
       $this->initialize();
       $this->build($fcmTokens, $title);

    }

    public function initialize()
    {
        define( 'API_ACCESS_KEY', 'AAAAC2blsCM:APA91bGK0M6Hwb31pYWsyXB5WUtE1c03j0D1LxJp3iMSlktfq1nzSjvEppPVs4jcsvz0hshoQYcZZfB0cikgVqSTHVQf2bWKp-4wCSxZ0tG1HVDQvx8v7fYQIcXDcEnAu8al2w6maLVo' );
    }

    public function getFcmTokens()
    {
        return Fcm::query()->where('user_id', Auth::user()->id)->pluck('fcm');
    }

    public function build($fcmTokens, string $title) :void
    {
        foreach ($fcmTokens as $fcmToken) {

            $data = array(
                "to" => $fcmToken,
                "notification" => array(
                    "title" => "New notification",
                    "body" => $title,
                    "icon" => "icon.png",
                    "click_action" => "/home"
                )
            );
            $data_string = json_encode($data);


            $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );

            $this->curl($headers, $data_string);
        }
    }

    public function curl($headers, $data_string) :void
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

        curl_exec($ch);

        curl_close($ch);
    }
}