<?php

namespace App\Policies;

use App\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Permission $permission)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('View permissions');
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Permission $permission)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('Update permissions');
    }

    public function delete(User $user, Permission $permission)
    {
        //
    }

    public function restore(User $user, Permission $permission)
    {
        //
    }

    public function forceDelete(User $user, Permission $permission)
    {
        //
    }
}
