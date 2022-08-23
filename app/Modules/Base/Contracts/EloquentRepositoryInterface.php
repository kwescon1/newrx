<?php

namespace App\Modules\Base\Contracts;

use Illuminate\Database\Eloquent\{
    Collection,
    Model
};


interface EloquentRepositoryInterface
{
    public function find(int $id): ?Model;

    public function create(array $data): ?Model;

    public function update(int $id, array $data): ?Model;

    public function destroy(int $id): ?bool;

    public function all(): ?Collection;
}
