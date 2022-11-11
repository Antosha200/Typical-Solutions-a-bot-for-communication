<?php
/**
 * @author Anton Naumov
 */

echo "FrontController<br>";

class FrontController{

    public static function getInstance()
    {
        static $instance;
        if (!isset($instance)) $instance = new self;
        return $instance;
    }

    public function makeRoute(){

        echo "makingRoute<br>";
        $TelegramAPI = new TelegramAPI();

        $chatUpdates = $TelegramAPI->getUpdates();

        // 

        switch ($chatUpdates['type']){
            case 'Политика': $Politics = new Politics();
                break;
            case 'Текущая погода': $Weather = new Weather();
                break;
            case 'Наука': $Science = new Science();
                break;
            case 'Случайно': $Random = new Random();
                break;
            case 'Технологии': $Technologies = new Technologies();
        }
    }
}
