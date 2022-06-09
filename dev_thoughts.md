            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),

@foreach ($subjects as $item)
    @if ($item->id == $subject->id)
        <td>
            {{  $subject->pivot->mark ?? '' }}
            @php
                break
            @endphp
        </td>
    @else
        <td>
        </td>
    @endif
    
@endforeach

public function attachAllSubjects()
    {
        $subjects = Subject::all();
        
        $this->load('subjects');

        foreach($this->subjects as $subject){
            foreach ($subjects as $item) {
                if ($this->subjects->contains($item)) {    
                } else {
                    $this->subjects->push($item);
                }
            $this->subjects = $this->subjects->sort();
            }
        }

        return $this;
    }