<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMarkRequest;
use Illuminate\Support\Facades\DB;

use App\Models\Subject;
use App\Models\User;

class UserSubjectController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $student)
    {
        $subjects = Subject::whereDoesntHave('users', function($querry) use ($student){
            $querry->where('user_id', $student->id);
        })->pluck('name', 'id');

        return view('marks.create', compact('student', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarkRequest $request, User $student)
    {
        $student->subjects()->attach($request->subject_id, ['mark' => $request->mark]);

        return redirect()->route('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student, Subject $subject)
    {
        $student->load('subjects');   
        $subject = $student->subjects->find($subject->id);

        $subjects = [];

        return view('marks.edit', compact('student', 'subject', 'subjects')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMarkRequest $request, User $student, Subject $subject)
    {
        $student->subjects()->updateExistingPivot($subject->id, ['mark' => $request->mark]);

        return redirect()->route('students.show', $student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student, Subject $subject)
    {
        $student->subjects()->detach($subject);

        return redirect()->route('students.show', $student->id);
    }
}