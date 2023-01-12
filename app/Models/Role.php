<?php

namespace Application\Models;

use GreatWebsiteStudio\Database\Model;

class Role extends Model
{
    /**
     * @var string
     */
    protected string $table = 'roles';

    /**
     * @var array
     */
    protected array $attributes = [
        'name',
    ];
}
