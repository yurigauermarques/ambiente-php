<?php

namespace AppBundle\Command;

use Composer\Script\Event;
use Symfony\Component\Dotenv\Dotenv;

/**
 * 
 * @author Yuri Gauer Marques <yurigmarques@gmail.com>
 * 
 * @see http://php.net/manual/pt_BR/function.putenv.php
 * @see https://symfony.com/doc/3.4/components/dotenv.html
 */
class ScriptHandler
{

    /**
     * 
     * @param Event $event
     */
    public static function buildEnvironment(Event $event)
    {
        /* @var $dotenv Dotenv */
        $dotenv = new Dotenv();

        $dotenv->load(__DIR__ . '/../../../.env');
    }

}
