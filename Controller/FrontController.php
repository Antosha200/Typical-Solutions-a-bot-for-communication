<?php
/**
 * @author Anton Naumov
 */

class FrontController{

    public static function getInstance()
    {
        static $instance;
        if (!isset($instance)) $instance = new self;
        return $instance;
    }

    public function makeRoute(){

        $TelegramAPI = new TelegramAPI();

        sleep(10);
        $chatUpdates = $TelegramAPI->getUpdates();
        $lastMessage = $chatUpdates["result"][count($chatUpdates["result"])-1]["message"]["text"]; //последнее текстовое сообщение

        switch ($lastMessage){
            case 'Политика': new Politics();
                break;
            case 'Текущая погода': new Weather();
                break;
            case 'Случайная': new Random();
                break;
            case 'Технологии': new Technologies();
                break;
            default: $TelegramAPI->sendRequest('sendMessage', ['chat_id' => CHAT_ID, 'text' => 'Ваше сообщение не распознано. Убедитесь, что точно попали по кнопке']);
        }
    }
}
