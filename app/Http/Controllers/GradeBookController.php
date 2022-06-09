<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Subject;
use App\Models\Group;

class GradeBookController extends Controller
{
    public function index()
    {
        $students = User::paginate(10);
        $students->load(['subjects' => function($query) {
            $query->orderBy('subject_id', 'asc');
        }])->map(function($item){
            return $item->attachSubjects();
        });

        $subjects = Subject::all();

        $groups = Group::all();
        $groups->load('user');
        
        

        foreach ($groups as $group) {
            foreach($group->user as $user) {
                $user->load('subjects');
                //dd($user);

            }
        }
        
        

        /* Для отладки */

        /*foreach ($students as $student) {
            $student->subjects->dd();
        }*/
        
        //dd($students);
        //dd($subjects);
        //dd($groups);

        return view('gradebook.index', compact('students', 'subjects', 'groups'));
    }

}
