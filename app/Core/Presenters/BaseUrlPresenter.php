<?php declare(strict_types=1);

namespace App\Core\Presenters;

use App\Core\Constants\RouteMethods;
use App\Core\Entities\BaseEntity;
use App\Exceptions\NoEntitySetException;

abstract class BaseUrlPresenter
{

    protected string $routeName;

    public function __construct(
        protected readonly ?BaseEntity $entity = null, protected readonly ?BaseEntity $secondaryEntity = null
    ) {
    }

    public function index(): string
    {
        return route($this->routeName . '.' . RouteMethods::INDEX->value);
    }

    public function show(): string
    {
        if (!$this->entity) {
            throw new NoEntitySetException();
        }

        if ($this->secondaryEntity?->getId()) {
            return route($this->routeName . '.' . RouteMethods::SHOW->value, [
                $this->secondaryEntity?->getId(),
                $this->entity->getId(),
            ]);
        }

        return route($this->routeName . '.' . RouteMethods::SHOW->value, [
            $this->entity->getId(),
        ]);
    }

    public function edit(): string
    {
        if (!$this->entity) {
            throw new NoEntitySetException();
        }

        if ($this->secondaryEntity?->getId()) {
            return route($this->routeName . '.' . RouteMethods::EDIT->value, [
                $this->secondaryEntity?->getId(),
                $this->entity->getId(),
            ]);
        }

        return route($this->routeName . '.' . RouteMethods::EDIT->value, [
            $this->entity->getId(),
        ]);
    }

    public function update(): string
    {
        if (!$this->entity) {
            throw new NoEntitySetException();
        }

        if ($this->secondaryEntity?->getId()) {
            return route($this->routeName . '.' . RouteMethods::UPDATE->value, [
                $this->secondaryEntity?->getId(),
                $this->entity->getId()
            ]);
        }

        return route($this->routeName . '.' . RouteMethods::UPDATE->value, [
            $this->entity->getId(),
        ]);
    }

    public function create(): string
    {
        if (!$this->secondaryEntity) {
            return route($this->routeName . '.' . RouteMethods::CREATE->value);
        }

        return route($this->routeName . '.' . RouteMethods::CREATE->value, [
            $this->secondaryEntity->getId()
        ]);

    }

    public function store(): string
    {
        if (!$this->secondaryEntity) {
            return route($this->routeName . '.' . RouteMethods::STORE->value);
        }

        return route($this->routeName . '.' . RouteMethods::STORE->value, [
            $this->secondaryEntity->getId()
        ]);
    }

    public function destroy(): string
    {
        if (!$this->entity) {
            throw new NoEntitySetException();
        }

        if ($this->secondaryEntity?->getId()) {
            return route($this->routeName . '.' . RouteMethods::DESTROY->value, [
                $this->secondaryEntity?->getId(),
                $this->entity->getId()
            ]);
        }

        return route($this->routeName . '.' . RouteMethods::DESTROY->value, [
            $this->entity->getId(),
        ]);
    }
}
