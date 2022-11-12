<?php

class Weather{
    public function __construct(){

        $content = file_get_contents('https://world-weather.ru/pogoda/belarus/minsk/');

        $temperature = Parser::parse($content, '<div id="weather-now-number">', '</div>'); //+
        $humidity = '75%';
        $wind = '8.3 м/с';
        $visibility = '10 км';

        $temperature = preg_replace("/[a-z]/i", "", $temperature);
        $temperature = strtr($temperature, ['<'=>'', '>'=>'', ':'=>'', '='=>'', '_'=>'', '&'=>'', '"'=>'', '--'=>'', '-'=>'', '/'=>'']);

        $text = 'Температура воздуха: ' . $temperature . PHP_EOL . 'Влажность: ' . $humidity . PHP_EOL . 'Скорость ветра: ' . $wind . PHP_EOL . 'Видимость: ' . $visibility;

        TelegramAPI::sendRequest('sendMessage', ['chat_id'=>CHAT_ID, 'text'=>"$text"]);
    }
}
