<?php

namespace App\Policies;

use TeamTeaTime\Forum\Models\Category;
use TeamTeaTime\Forum\Policies\CategoryPolicy as Base;
class CategoryPolicy extends Base
{
    public function deleteThreads($user, Category $category): bool
    {
        return true;
    }

    public function enableThreads($user, Category $category): bool
    {
        if (in_array($user->role->name, ['Admin'])) {
            return true;
        }

        if ($category->is_for_module && $user->role->name == 'Teacher' && $user->teacher->modules->contains($category->module)) {
            return true;
        }

        return false;

    }

    public function moveThreadsFrom($user, Category $category): bool
    {
        if (in_array($user->role->name, ['Admin'])) {
            return true;
        }

        if ($category->is_for_module && $user->role->name == 'Teacher' && $user->teacher->modules->contains($category->module)) {
            return true;
        }

        return false;

    }

    public function moveThreadsTo($user, Category $category): bool
    {
        if (in_array($user->role->name, ['Admin'])) {
            return true;
        }

        if ($category->is_for_module && $user->role->name == 'Teacher' && $user->teacher->modules->contains($category->module)) {
            return true;
        }

        return false;
    }

    public function lockThreads($user, Category $category): bool
    {
        if (in_array($user->role->name, ['Admin'])) {
            return true;
        }

        if ($category->is_for_module && $user->role->name == 'Teacher' && $user->teacher->modules->contains($category->module)) {
            return true;
        }

        return false;

    }

    public function pinThreads($user, Category $category): bool
    {
        if (in_array($user->role->name, ['Admin'])) {
            return true;
        }

        if ($category->is_for_module && $user->role->name == 'Teacher' && $user->teacher->modules->contains($category->module)) {
            return true;
        }

        return false;

    }

    public function view($user, Category $category): bool
    {
        return $user->role->name == 'Admin';
    }

    public function delete($user, Category $category): bool
    {
        return $user->role->name == 'Admin';
    }
}
