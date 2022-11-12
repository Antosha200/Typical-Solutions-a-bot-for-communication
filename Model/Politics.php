<?php

class Politics
{
    public function __construct(){

        $content = file_get_contents('https://www.belta.by/politics/');

        $pageWithLinks = Parser::parse($content, '<div class="main_in_rubric">', '</div>');
        $pageLink = Parser::parseFirstLink($pageWithLinks);
        $page = file_get_contents($pageLink);

        preg_match_all('#<p>(.+?)</p>#is', $page, $arr);
        $text = implode($arr[0]);

        $text = str_replace(['<p>', '</p>'], '', $text);
        $text = preg_replace("/[a-z]/i", "", $text);
        $text = strtr($text, ['<'=>'', '>'=>'', ':'=>'', '='=>'', '_'=>'', '&'=>'', '"'=>'', '"читать далее"'=>'']);
        $text = trim($text);

        TelegramAPI::sendRequest('sendMessage', ['chat_id'=>CHAT_ID, 'text'=>$text]);

    }

}
