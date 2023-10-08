<?php

namespace App\Http\Controllers;

use TeamTeaTime\Forum\Models\Post;

class AdminDashboardStatsController extends Controller
{
    public function index()
    {
        $teachersCount = \App\Models\User::where('role_id', 2)->count();
        $studentsCount = \App\Models\User::where('role_id', 3)->count();
        $gradesCount = \App\Models\Grade::count();
        $classesCount = \App\Models\GradeClasses::count();

        // get the latest forum posts and the link to the post
        $latestForumPosts = Post::orderBy('created_at', 'desc')
            ->take(5)->get();

//        <a href="{{ Forum::route('post.show', $post) }}" class="text-gray-500">{{ trans('forum::general.permalink') }}</a>


        return view('dashboard.admin',
            compact('teachersCount', 'studentsCount', 'gradesCount', 'classesCount', 'latestForumPosts'));

    }
}
