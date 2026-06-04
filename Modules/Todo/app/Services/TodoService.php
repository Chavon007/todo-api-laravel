<?php

namespace Modules\Todo\Services;

use Modules\Todo\Repositories\Interfaces\TodoRepositoryInterface;

class TodoService
{
    public function __construct(protected TodoRepositoryInterface $repository) {}

    public function getAll() { return $this->repository->all(); }
    public function getById(int $id) { return $this->repository->find($id); }
    public function create(array $data) { return $this->repository->create($data); }
    public function update(int $id, array $data) { return $this->repository->update($id, $data); }
    public function delete(int $id) { return $this->repository->delete($id); }
}