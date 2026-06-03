<?php

namespace Modules\Todo\Repositories;

use Modules\Todo\Models\Todo;
use Modules\Todo\Repositories\Interfaces\TodoRepositoryInterface;

class TodoRepository implements TodoRepositoryInterface
{
    public function all() { return Todo::all(); }
    public function find(int $id) { return Todo::findOrFail($id); }
    public function create(array $data) { return Todo::create($data); }
    public function update(int $id, array $data) {
        $todo = Todo::findOrFail($id);
        $todo->update($data);
        return $todo;
    }
    public function delete(int $id) { return Todo::findOrFail($id)->delete(); }
}