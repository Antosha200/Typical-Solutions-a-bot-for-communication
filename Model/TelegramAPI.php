<?php
/**
 * @author Anton Naumov
 */

echo 'Telegram API<br>';

const TOKEN = '5651939402:AAEkpC2SVaxeGanut29D_VlGbNM_nYKNfqQ';
const BASE_URL = 'https://api.telegram.org/bot';
const CHAT_ID = 445503956;

class TelegramAPI
{
    public function __construct()
    {
        $this->sendRequest('sendMessage', ['chat_id' => CHAT_ID, 'text' => 'Приветствуем в новостном боте! Пожалуйста, выберите интересующий тип новостей в меню.',
            'reply_markup' => json_encode(array(
                'keyboard' => array(
                    array(
                        array(
                            'text' => 'Текущая погода',
                            'url' => '',
                        ),
                        array(
                            'text' => 'Политика',
                            'url' => '',
                        ),
                        array(
                            'text' => 'Технологии',
                            'url' => '',
                        ),
                        array(
                            'text' => 'Новейшее',
                            'url' => '',
                        ),
                    )
                ),
                'one_time_keyboard' => TRUE,
                'resize_keyboard' => TRUE,
        )),]);
    }

    public static function sendRequest($method, $data, $headers = [])
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => BASE_URL . TOKEN . '/' . $method,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"))
        ]);
        $result = curl_exec($curl);
        curl_close($curl);
        return (json_decode($result, 1) ? json_decode($result, 1) : $result);
    }

    public function getUpdates()
    {
        return $this->sendRequest('getUpdates', []);
    }
}
