<?php

namespace App\Attributes;
use Attribute;

#[\Attribute]
class Route{

    public function __construct(public string $routePath, public string $method = 'get')
    {
        
    }

}