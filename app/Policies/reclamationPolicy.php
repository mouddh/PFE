<?php

namespace App\Policies;

use App\Models\User;
use App\Models\reclamation;
use Illuminate\Auth\Access\Response;

class reclamationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->type == 'engineer'){
            return true;
        }
        return false;
    }
    public function client_update_reclamation(User $user): bool
    {
        if($user->type == 'client'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, reclamation $post): bool
    {
        if($user->type == 'technicien'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, reclamation $post): bool
    {
        if($user->type == 'admin' || $user->type == 'technicien'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, reclamation $post): bool
    {
        if($user->type == 'admin' || $user->type == 'technicien' ){
            return true;
        }
        return $user->id == $post->user_id;
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user,reclamation $post): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, reclamation $post): bool
    {
        //
    }
}
