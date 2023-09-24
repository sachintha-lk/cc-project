<?php

namespace App\Policies;

use App\Models\Module;
use TeamTeaTime\Forum\Models\Category;
use TeamTeaTime\Forum\Policies\CategoryPolicy as Base;

class CategoryPolicy extends Base
{
    protected $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    public function deleteThreads($user, Category $category): bool
    {
        return true;
    }

    public function enableThreads($user, Category $category): bool
    {
        return $this->canPerformAction($user, $category);
    }

    public function moveThreadsFrom($user, Category $category): bool
    {
        return $this->canPerformAction($user, $category);
    }

    public function moveThreadsTo($user, Category $category): bool
    {
        return $this->canPerformAction($user, $category);
    }

    public function lockThreads($user, Category $category): bool
    {
        return $this->canPerformAction($user, $category);
    }

    public function pinThreads($user, Category $category): bool
    {
        return $this->canPerformAction($user, $category);
    }

    public function view($user, Category $category): bool
    {
        return $user->role->name == 'Admin';
    }

    public function delete($user, Category $category): bool
    {
        return $user->role->name == 'Admin';
    }

    protected function canPerformAction($user, Category $category): bool
    {
        if (in_array($user->role->name, ['Admin'])) {
            return true;
        }

        $module = $this->module->where('id', $category->module_id)->first();

        if ($category->is_for_module && $user->role->name == 'Teacher' && $user->id === $module->teacher_id) {
            return true;
        }

        return false;
    }
}
