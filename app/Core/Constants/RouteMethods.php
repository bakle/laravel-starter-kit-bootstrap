<?php declare(strict_types=1);

namespace App\Core\Constants;

enum RouteMethods: string
{
    case INDEX = 'index';
    case SHOW = 'show';
    case EDIT = 'edit';
    case UPDATE = 'update';
    case CREATE = 'create';
    case STORE = 'store';
    case DESTROY = 'destroy';
}
