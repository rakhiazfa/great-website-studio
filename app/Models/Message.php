<?php

namespace Application\Models;

use GreatWebsiteStudio\Database\Model;

class Message extends Model
{
    /**
     * @var string
     */
    protected string $table = 'messages';

    /**
     * @var array
     */
    protected array $attributes = ['name', 'email', 'message'];
}
