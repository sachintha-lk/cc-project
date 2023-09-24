<?php

namespace App\Http\Livewire;

use App\Models\Module;

use App\Models\StudentQuizScore;

use App\Models\Assignment;

use Harishdurga\LaravelQuiz\Models\Quiz;
use Livewire\Component;

class MyModuleDetails extends Component
{
    public $assignments;

    public $module;

    public $module_id;

    public $quizzes;

    public $resources;

    public $leaderboardStudents;

    public function mount($module_id)
    {
        $this->module_id = $module_id;
        $this->module = Module::find($module_id);

        $this->assignments = Assignment::with(['submissions.submissionGrade'])
            ->where('module_id', $this->module_id)
            ->get();


        $this->quizzes = Quiz::where('module_id', $this->module_id)
            ->where('is_published', 1)
            ->get();

        $this->resources = $this->module->courseResources;

        $this->loadQuizLeaderBoards();


    }



    public function render()
    {
        return view('livewire.my-module-details');
    }

    private function loadQuizLeaderBoards() {

        $studentQuizScores = StudentQuizScore::select('student_user_id', \DB::raw('SUM(score) as total_score'))
            ->where('module_id', $this->module->id)
            ->with('student')
            ->groupBy('student_user_id')
            ->orderBy('total_score', 'desc')
            ->get();

        $this->leaderboardStudents = $studentQuizScores;
    }
}
