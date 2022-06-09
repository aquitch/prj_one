<form class="mb-4 row container-sm justify-content-center" method="POST" action="{{ $action }}">
@csrf
@method($method)
    <div class="col-auto">
        <select class="form-select" name="subject_id" {{ count($subjects) == 0 ? 'hidden' : '' }}>
            @foreach ($subjects as $key => $value)
            <option value="{{ $key }}" {{ isset($subject) && $key == $subject->id ? 'selected' : '' }}>
                {{ $value }}
            </option>
            @endforeach          
        </select> 
    </div>
    <div class="col-auto"> 
        <input class="form-control" placeholder="Оценка" type="text" name="mark" id="mark" value="{{ isset($subject) ? $subject->pivot->mark : '' }}">
    </div>
    <div class="col-auto">
        <button class="btn btn-primary" type="submit">Исполнить</button>
    </div>
</form>