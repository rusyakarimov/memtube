<?php

class Messages
{

    public $text;

    public function show_error($text)
    {
        echo '<p class="error-message">' . $text . '</p>';
        echo '<a class="welcome__button button" href="/">На главную</a>';
    }

    public function show_success($text)
    {
        echo '<p class="success-message">' . $text . '</p>';
        echo '<a class="welcome__button button" href="/">На главную</a>';
    }
}
