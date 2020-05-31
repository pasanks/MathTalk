<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Attribute\UserAttribute;
use App\Models\Auth\Traits\Method\UserMethod;
use App\Models\Auth\Traits\Relationship\UserRelationship;
use App\Models\Auth\Traits\Scope\UserScope;

/**
 * Class User.
 */
class User extends BaseUser
{
    protected $fillable = [
        'first_name','last_name', 'email','contact_no','contact_address','school',
        'confirmation_code', 'password', 'active','confirmed'
    ];
    use UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope;

}
