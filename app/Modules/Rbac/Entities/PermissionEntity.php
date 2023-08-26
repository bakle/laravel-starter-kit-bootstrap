<?php declare(strict_types=1);

namespace App\Modules\Rbac\Entities;

use App\Core\Entities\BaseEntity;
use App\Core\Presenters\BaseUrlPresenter;
use App\Modules\Rbac\Constants\Permissions;

class PermissionEntity extends BaseEntity
{

    public function getName(): string
    {
        return $this->model->name;
    }

    public function getLabel(): string
    {
        return Permissions::getLabel($this->model->name);
    }

    public function url(): ?BaseUrlPresenter
    {
        return null;
    }

}
