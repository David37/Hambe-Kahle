<?php

function makeFacebookApiCall($endpoint,$params){
    $ch= curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint  . '?' . http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $fbResponse= curl_exec($ch);
    $fbResponse= json_decode($fbResponse,TRUE);
    curl_close($ch);
    return array(
        'endpoint'=> $endpoint,
        'params'=> $params,
        'has_errors'=> isset($fbResponse['error']) ? TRUE : FALSE,
        'error_message'=> isset($fbResponse['error']) ? $fbResponse['error']['message'] : '',
        'fb_response'=> $fbResponse
    );

}

function getFacebookLoginUrl(){
        $endpoint='https://www.facebook.com/'. FB_GRAPH_VERSION . '/dialog/oauth';
        $params= array(
            'client_id'=> FB_APP_ID,
            'redirect_uri'=> FB_REDIRECT_URI,
            'state'=> FB_APP_STATE,
            'scope'=> 'email,user_gender',
            'auth_type'=>'rerequest'
        );
        return $endpoint . '?' . http_build_query($params);
    }
function getAccessTokenWithCode($code){
    $endpoint= 'https://graph.facebook.com/'. FB_GRAPH_VERSION . '/oauth/access_token';

    $params= array(
        'client_id'=> FB_APP_ID,
        'client_secret'=> FB_APP_SECRET,
        'redirect_uri'=> FB_REDIRECT_URI,
        'code'=> $code
    );

    return makeFacebookApiCall($endpoint,$params);
}

function getFacebookUserInfo($accesToken){
    $endpoint=FB_GRAPH_DOMAIN . 'me';
    $params=array(
        'fields'=> "first_name,last_name,email,gender",
        'access_token'=> $accesToken
    );
    return makeFacebookApiCall($endpoint,$params);
}

function tryLoginWithFacebook($get){
    $status='fail';
    if(isset($get['error'])){
        $message=$get['error_description'];
    }else{
        $accessTokenInfo= getAccessTokenWithCode($get['code']);
        if($accessTokenInfo['has_errors']){
            $message=$accessTokenInfo['error_message'];
        }else{
            $_SESSION['fb_access_token']=$accessTokenInfo['fb_response']['access_token'];
            $fbUserInfo= getFacebookUserInfo($_SESSION['fb_access_token']);

            if(!$fbUserInfo['has_errors'] && !empty($fbUserInfo['fb_response']['id'] &&
                !empty($fbUserInfo['fb_response']['email']))){
                    $status='ok';
                    $_SESSION['fb_user_info']=$fbUserInfo['fb_response'];
                }
        }
    }

    return array(
        'status'=> $status,
        'message'=>$message
    );
}