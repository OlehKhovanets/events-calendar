<?php

namespace App\Services\CloudMessaging;

interface CloudMessageInterface
{
    public function push(string $title);
}