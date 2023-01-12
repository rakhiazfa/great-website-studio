<?php

namespace Application\Models;

use GreatWebsiteStudio\Database\Model;

class User extends Model
{
    /**
     * @var string
     */
    protected string $table = 'users';

    /**
     * @var array
     */
    protected array $attributes = [
        'name',
        'email',
        'password',
        'role_id',
    ];
}
