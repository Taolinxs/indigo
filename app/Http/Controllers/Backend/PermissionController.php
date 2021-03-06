<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StoreUpdatePermissionRequest;
use App\Repositories\Contracts\PermissionRepository;

/**
 * Class PermissionController
 * @package App\Http\Controllers\Backend
 */
class PermissionController extends BackendController
{
    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * PermissionController constructor.
     * @param \App\Repositories\Contracts\PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->permissionRepository->paginate(10);

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUpdatePermissionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUpdatePermissionRequest $request)
    {
        $permission = $this->permissionRepository->create($request->all());

        return $this->successCreated($permission);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perm = $this->permissionRepository->find($id);

        return response($perm);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->find($id);

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreUpdatePermissionRequest $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreUpdatePermissionRequest $request, $id)
    {
        $permission = $this->permissionRepository->update($request->all(), $id);

        return $this->successCreated($permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->permissionRepository->delete($id);

        return $this->successDeleted();
    }
}
