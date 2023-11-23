<?php

namespace App\Http;

use Dedoc\Scramble\Support\Generator\SecurityScheme;

class ApiTokenSecurityScheme extends SecurityScheme
{
    public string $scheme;

    public string $bearerFormat = '';

    public function __construct(string $scheme, string $bearerFormat = '')
    {
        parent::__construct('http');

        $this->scheme = $scheme;
        $this->bearerFormat = $bearerFormat;
    }

    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'scheme' => $this->scheme,
            'bearerFormat' => $this->bearerFormat,
        ]);
    }
}
