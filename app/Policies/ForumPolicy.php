<?php

namespace App\Policies;

use TeamTeaTime\Forum\Policies\ForumPolicy as Base;

class ForumPolicy extends Base
{
    public function createCategories($user): bool
    {
        return $user->role->name == 'Admin';
    }

    public function moveCategories($user): bool
    {
        return $user->role->name == 'Admin';
    }

    public function renameCategories($user): bool
    {
        return $user->role->name == 'Admin';
    }

    public function viewTrashedThreads($user): bool
    {
        return in_array($user->role->name, ['Teacher', 'Admin']);
    }
}
