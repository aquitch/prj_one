<form class="mb-4 mt-2 row container-sm justify-content-center" method='POST' action="{{ $action }}">
    @csrf
    @method($method)
    <div class="row">
        <label class="col-auto" for="name">Имя</label>
        <input class="form-control" type='text' name='name' id='name' placeholder='Имя' value="{{ isset($student) ? $student->name : '' }}">
    </div>
    <div class="row">
        <label class="col-auto col-form-label" for="bday">Дата рождения</label>
        <input class="form-control" type='text' name='bday' id='bday' placeholder='YYYY-MM-DD' value="{{ isset($student) ? $student->bday : '' }}">
    </div>
    <div class="row">    
        <label class="col-auto col-form-label" for="group">Группа</label>
        <select class="form-select" name="group_id">
            @foreach ($groups as $group)            
                    <option value="{{ $group->id }}" {{ isset($student) && $student->group_id == $group->id ? 'selected': '' }}>{{ $group->name }}</option>                        
            @endforeach
        </select>
    </div>
    <div class="row mt-2">
        <button class="btn btn-primary" action='submit'>{{ isset($student) ? 'Обновить' : 'Добавить' }}</button>
    </div>
</form>