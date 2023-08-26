<?php declare(strict_types=1);

namespace App\Modules\Rbac\Presenters;

use App\Core\Presenters\BaseUrlPresenter;

class RoleUrlPresenter extends BaseUrlPresenter
{
    protected string $routeName = 'roles';
}
