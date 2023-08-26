<?php declare(strict_types=1);

namespace App\Modules\Rbac\Constants;

enum Permissions: string
{
    case LIST_USER = 'list_user';
    case SHOW_USER = 'show_user';
    case CREATE_USER = 'create_user';
    case EDIT_USER = 'edit_user';
    case DELETE_USER = 'delete_user';

    public function label(): string
    {
        return static::getLabel($this->value);
    }

    public static function getLabel(string $value): string
    {
        return trans('permissions.' . $value);
    }
}
