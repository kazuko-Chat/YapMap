<?php

        require_once 'SDK/API_Config.php';
        require_once 'SDK/OpenTokSDK.php';
        require_once 'SDK/OpenTokSession.php';
        require_once 'Zend/Json.php';


        $apiObj = new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);

        $client = "";

        if (isset($_SERVER["REMOTE_ADDR"]))    {
                $client = $_SERVER["REMOTE_ADDR"];
        }
        else if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))    {
                $client = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        else if (isset($_SERVER["HTTP_CLIENT_IP"]))    {
                $client = $_SERVER["HTTP_CLIENT_IP"];
        }


        if(isset($_REQUEST['sessionId'])) {
                $sessionId = $_REQUEST['sessionId'];
        } else {
                $session = $apiObj->create_session($client);

                $sessionId = $session->getSessionId();
        }

        $token = $apiObj->generate_token();

        $arr = array ('token'=>$token,'sessionId'=>(string)$sessionId);
        echo  Zend_Json::encode($arr);

        // need to use Zend library because php is ver 5.1.6
?>
