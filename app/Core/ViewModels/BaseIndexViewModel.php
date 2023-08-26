<?php declare(strict_types=1);

namespace App\Core\ViewModels;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class BaseIndexViewModel
{
    protected string $entityClass;

    protected LengthAwarePaginator $models;

    abstract public function getTitle(): string;

    abstract public function setEntityClass(): void;

    public function __construct(
        protected readonly Builder $query, protected readonly Request $request
    ) {
        $this->setEntityClass();
        $this->runQuery();
    }

    public function build(): array
    {
        return [
            'items' => $this->getEntities(),
            'pagination' => $this->getPaginationLink(),
            'title' => $this->getTitle()
        ];
    }

    protected function getEntities(): Collection
    {
        return $this->models->map(function (Model $model) {
            return new $this->entityClass($model);
        });
    }

    protected function getPaginationLink(): Htmlable
    {
        return $this->models->links();
    }

    private function runQuery(): void
    {
        $this->models = $this->query->paginate();
    }

}
