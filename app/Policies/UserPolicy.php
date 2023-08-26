<?php declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use App\Modules\Rbac\Constants\Permissions;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can(Permissions::LIST_USER->value);
    }

    public function create(User $user): bool
    {
        return $user->can(Permissions::CREATE_USER->value);
    }

    public function update(User $user): bool
    {
        return $user->can(Permissions::EDIT_USER->value);
    }

    public function delete(User $user): bool
    {
        return $user->can(Permissions::DELETE_USER->value);
    }
}
