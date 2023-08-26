<?php declare(strict_types=1);

namespace App\Modules\Rbac\Entities;

use App\Core\Entities\BaseEntity;
use App\Core\Presenters\BaseUrlPresenter;
use App\Modules\Rbac\Presenters\RoleUrlPresenter;
use Illuminate\Support\Collection;

class RoleEntity extends BaseEntity
{

    public function getName(): ?string
    {
        return $this->model->name;
    }

    public function getPermissionIds(): Collection
    {
        return $this->model->permissions->pluck('id');
    }

    public function hasPermission(int $permissionId): bool
    {
        return $this->getPermissionIds()->contains($permissionId);
    }

    public function url(): ?BaseUrlPresenter
    {
        return new RoleUrlPresenter($this);
    }

}
