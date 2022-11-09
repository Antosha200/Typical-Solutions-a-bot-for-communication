<?php
/**
 * @author Anton Naumov
 */

echo 'Telegram API';

const TOKEN = '5651939402:AAEkpC2SVaxeGanut29D_VlGbNM_nYKNfqQ';
const BASE_URL = 'https://api.telegram.org/bot' . TOKEN . '/';
const CHAT_ID = 445503956; //possible can not to be hardcoded

class TelegramAPI
{
    public function sendRequest($method, $params = [])
    {

        if (!empty($params)) {
            $url = BASE_URL . $method . '?' . http_build_query($params);
        } else {
            $url = BASE_URL . $method;
        }

        return json_decode(file_get_contents($url), JSON_OBJECT_AS_ARRAY);

    }
}
