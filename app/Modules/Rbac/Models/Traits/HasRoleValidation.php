<?php declare(strict_types=1);

namespace App\Modules\Rbac\Models\Traits;

trait HasRoleValidation
{
    public static function getRules(): array
    {
        return [
            'name' => 'required'
        ];
    }
}
