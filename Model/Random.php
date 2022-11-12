<?php

class Random{
    public function __construct(){
        TelegramAPI::sendRequest('sendMessage', ['chat_id'=>CHAT_ID, 'text'=>'Случайная новость в том, что она случайная']);
         }
}
