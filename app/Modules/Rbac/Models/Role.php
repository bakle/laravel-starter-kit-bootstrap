<?php declare(strict_types=1);

namespace App\Modules\Rbac\Models;

use App\Modules\Rbac\Models\Traits\HasRoleValidation;

class Role extends \Spatie\Permission\Models\Role
{
    use HasRoleValidation;
}
