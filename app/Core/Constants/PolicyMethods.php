<?php declare(strict_types=1);

namespace App\Core\Constants;

enum PolicyMethods: string
{
    case VIEW_ANY = 'viewAny';
    case VIEW = 'view';
    case CREATE = 'create';
    case UPDATE = 'update';
    case DELETE = 'delete';
}
