<?php

namespace App\Attributes;

use App\Enums\HttpMethod;
use Attribute;
#[Attribute(Attribute::TARGET_METHOD|Attribute::IS_REPEATABLE)]
class Post extends Route
{
    public function __construct($pathInfo)
    {
        parent::__construct($pathInfo, HttpMethod::Post);
    }
}