<?php

namespace App\Services\CloudMessaging;

class Context
{
    protected $cloudMessage;

    public function __construct(CloudMessageInterface $cloudMessage)
    {
        $this->cloudMessage = $cloudMessage;
    }

    public function setStrategy($title)
    {
        $this->cloudMessage->push($title);
    }
}