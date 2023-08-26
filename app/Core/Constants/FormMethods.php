<?php declare(strict_types=1);

namespace App\Core\Constants;

enum FormMethods: string
{
    case POST = 'POST';
    case PATCH = 'PATCH';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
}
