<?php

namespace App\Http\Controllers;




use App\Models\Module;
use TeamTeaTime\Forum\Models\Category;
use TeamTeaTime\Forum\Models\Post;

class TeacherDashboardStatsController extends Controller
{
    public function __invoke()
    {

        $teacherId = auth()->user()->id;

        // get the mdules of the teacher
        $modules = Module::where('teacher_id', $teacherId)->get();

//        dd($modules);

        // get the categories of the modules
        $categories = Category::whereIn('module_id', $modules->pluck('id'))->get();
//        dd($categories);

        // get all the threads of the categories
        $threads = $categories->pluck('threads')->flatten();
//        dd($threads);

        // get the posts of the threads
        $latestForumPosts = $threads->pluck('posts')->flatten();

        // get the latest 5 post where post's thread's category has is_for_module = 0 and merge to the latestForumPosts

        $latestForumPosts = $latestForumPosts->merge(Post::whereHas('thread.category', function ($query) {
            $query->where('is_for_module', 0);
        })->latest()->take(5)->get());

        // sort the latestForumPosts by updated_at to get the latest 5 posts
        $latestForumPosts = $latestForumPosts->sortByDesc('updated_at')->take(5);

        // for all the teachers modules, get the latest 5 submissions with the student  and assignment
        $latestSubmissions = $modules->map(function ($module) {
            return $module->assignments->map(function ($assignment) {
                return $assignment->submissions->map(function ($submission) {
                    return $submission->load('student', 'assignment');
                });
            });
        })->flatten()->flatten()->sortByDesc('updated_at')->take(5);


        return view('dashboard.teacher', compact('latestForumPosts', 'latestSubmissions'));




    }
}
