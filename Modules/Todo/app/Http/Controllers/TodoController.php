<?php

namespace Modules\Todo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Todo\Services\TodoService;
use Modules\Todo\Http\Requests\StoreTodoRequest;
use Modules\Todo\Http\Requests\UpdateTodoRequest;

class TodoController extends Controller
{


public function __construct(protected TodoService $service) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->service->getAll());
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request) {
        return response()->json($this->service->create($request->validated()), 201);
    }

    /**
     * Show the specified resource.
     */
    public function show(int $id)
    {
        return response()->json($this->service->getById($id));
    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, int $id)
    {
        return response()->json($this->service->update($id, $request->validated()));
    }

  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) {
        $this->service->delete($id);
        return response()->json(null, 204);
    }
}
