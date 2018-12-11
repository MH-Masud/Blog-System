<?php

namespace App\Policies;

use App\admin;
use App\post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view the post.
     *
     * @param  \App\admin  $admin
     * @param  \App\post  $post
     * @return mixed
     */
    public function view(admin $admin)
    {
        //
    }

    /**
     * Determine whether the admin can create posts.
     *
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function create(admin $admin)
    {
        return $this->getPermission($admin,1);
    }

    /**
     * Determine whether the admin can update the post.
     *
     * @param  \App\admin  $admin
     * @param  \App\post  $post
     * @return mixed
     */
    public function update(admin $admin)
    {
        return $this->getPermission($admin,2);
    }

    /**
     * Determine whether the admin can delete the post.
     *
     * @param  \App\admin  $admin
     * @param  \App\post  $post
     * @return mixed
     */
    public function delete(admin $admin)
    {
        return $this->getPermission($admin,3);
    }

    /**
     * Determine whether the admin can restore the post.
     *
     * @param  \App\admin  $admin
     * @param  \App\post  $post
     * @return mixed
     */
    public function restore(admin $admin)
    {
        //
    }

    public function author(admin $admin)
    {
        return $this->getPermission($admin,4);
    }

    public function role(admin $admin)
    {
        return $this->getPermission($admin,5);
    }
    
    public function permission(admin $admin)
    {
        return $this->getPermission($admin,6);
    }

    public function tag(admin $admin)
    {
        return $this->getPermission($admin,7);
    }

    public function category(admin $admin)
    {
        return $this->getPermission($admin,8);
    }
    

    /**
     * Determine whether the admin can permanently delete the post.
     *
     * @param  \App\admin  $admin
     * @param  \App\post  $post
     * @return mixed
     */
    public function forceDelete(admin $admin)
    {
        //
    }

    public function getPermission($admin,$permission_id)
    {
        foreach ($admin->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $permission_id) {
                    
                    return true;
                }
            }
        }
        return false;
    }
}
