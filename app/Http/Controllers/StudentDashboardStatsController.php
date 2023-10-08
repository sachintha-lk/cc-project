<?php

namespace App\Http\Controllers;



use App\Models\Assignment;
use App\Models\Module;
use Carbon\Carbon;
use TeamTeaTime\Forum\Models\Category;
use TeamTeaTime\Forum\Models\Post;

class StudentDashboardStatsController extends Controller
{
    public function __invoke()
    {
        // get the class of the student
        $class = auth()->user()->class;

        // get the modules of the class
        $modules = $class->modules;

       // get the assignments belonging to modules of the class with deadline in the future with name of the module
        $assignments = Assignment::where('deadline', '>', Carbon::now())
            ->whereIn('module_id', $modules->pluck('id'))
            ->with('module')->get();


        // get the 5 latest resources of the modules of the class with name of the module
        $resources = $modules->map(function ($module) {
            return $module->courseResources()
                ->with('module')
                ->latest()->take(5)->get();
        })->flatten();

        // get the forum posts for the modules of the cass the student is in

        $studentClassId = auth()->user()->class->id;

        // get the mdules of the student
        $modules = Module::where('class_id', $studentClassId)->get();


        // get the categories of the modules
        $categories = Category::whereIn('module_id', $modules->pluck('id'))->get();


        // get all the threads of the categories
        $threads = $categories->pluck('threads')->flatten();

        // get the posts of the threads
        $latestForumPosts = $threads->pluck('posts')->flatten();

        // get the latest 5 post where post's thread's category has is_for_module = 0 and merge to the latestForumPosts

        $latestForumPosts = $latestForumPosts->merge(Post::whereHas('thread.category', function ($query) {
            $query->where('is_for_module', 0);
        })->latest()->take(5)->get());

        // sort the latestForumPosts by updated_at to get the latest 5 posts
        $latestForumPosts = $latestForumPosts->sortByDesc('updated_at')->take(5);


        return view('dashboard.student', compact('assignments', 'resources', 'latestForumPosts'));




    }
}
