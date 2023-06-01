<?php

use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {
        //redirect to view
    }

    public function searchAction()
    {
        $name = $this->request->get('id');
        $url = "https://www.googleapis.com/youtube/v3/search?q=" . $name;
        $token = "ya29.a0AWY7CklntKkHt8H1Ng8z-u7XH_-VmoOKYnI710KM5bAd0DgIAg8YAN1L7qbJihKmvXLhjzvIQ6w74J0ASbRpSc1QNCUnvr9mMn9pfXNw6iksv3ekR1yA5_Bw6Ba8P_iiuak4QooctYyuk1tZBug131VMbAUHaCgYKAXUSARISFQG1tDrpn4L_cWvtXsusU3I-X1hCCg0163";
        $ch = curl_init();
        $header = [
            "Authorization: Bearer " . $token
        ];
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $result = json_decode(curl_exec($ch));
        echo "<pre>";
        print_r($result);
        die;
    }
}
