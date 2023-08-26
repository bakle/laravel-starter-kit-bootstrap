<?php declare(strict_types=1);

namespace App\Core\Constants;

enum FormTypes: string
{
    case CREATE = 'create';
    case EDIT = 'edit';
}
