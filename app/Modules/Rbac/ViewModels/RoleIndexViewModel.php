<?php declare(strict_types=1);

namespace App\Modules\Rbac\ViewModels;

use App\Core\ViewModels\BaseIndexViewModel;
use App\Modules\Rbac\Entities\RoleEntity;

class RoleIndexViewModel extends BaseIndexViewModel
{
    public function getTitle(): string
    {
        return trans('roles.title');
    }

    public function getEntityClass(): string
    {
        return RoleEntity::class;
    }

    public function setEntityClass(): void
    {
        $this->entityClass = RoleEntity::class;
    }
}
