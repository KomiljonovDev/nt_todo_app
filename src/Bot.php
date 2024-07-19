<?php

use GuzzleHttp\Client;

class Bot {

    const TOKEN = "7020623614:AAGlX8nX84dHN-c6ajXzmtE2JCgfhLnb3H8";
    const API_URL = "https://api.telegram.org/bot" . self::TOKEN . "/";

    protected $http;

    public function __construct () {
        $this->http = new Client(['base_uri'=>self::API_URL]);
    }

    public function startHandlerCommand ($chat_id) {
        $this->http->post('sendMessage',[
            'form_params'=>[
                'chat_id'=>$chat_id,
                'text'=>"Welcome"
            ]
        ]);
    }

    public function addHandlerCommand ($chat_id) {
        $this->http->post('sendMessage',[
            'form_params'=>[
                'chat_id'=>$chat_id,
                'text'=>"enter task"
            ]
        ]);
    }
    public function echoBot (string $chat_id, string $text) {
        $post = $this->http->post('sendMessage',[
            'form_params'=>[
                'chat_id'=>$chat_id,
                'text'=>$text
            ]
        ]);
        echo "ok";

        print_r($post->getBody()->getContents());
    }
}