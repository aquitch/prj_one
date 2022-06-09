<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bday',
        'group_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
        
    public function group() 
    {
        return $this->belongsTo(Group::class); 
    }

    public function subjects() 
    {
        return $this->belongsToMany(Subject::class)->withPivot('mark'); 
    }

    public function attachSubjects()
    {
        $subjects = Subject::all();

        $this->load('subjects');

        $this->subjects->map(function ($item) {

        });

        foreach ($subjects as $item) {
            if ($this->subjects->contains($item)) {
                //Do nothing...
            } else {
                $this->subjects->push($item);
            } 
        }
        $this->subjects = $this->subjects->sort();
        return $this;
    }

    public function attachSubjectsViaMap()
    {
        $subjects = Subject::all();

        $this->load('subjects');

        $subjects->map(function ($item) {
            foreach ($this->s as $key => $value) {
                # code...
            }
        });
        return $this;
    }

    public function getAvgMark()
    {
        $acc = collect();

        foreach ($this->subjects as $subject) {
            if (isset($subject->pivot->mark)) {
                $acc->push($subject->pivot->mark);
            }
        }

        return $acc->avg();
    }
}