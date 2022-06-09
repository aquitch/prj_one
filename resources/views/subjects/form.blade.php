<form class="mb-4 row container-sm justify-content-center" method='POST' action="{{ $action }}">
    @csrf
    @method($method)
    <div class="row">        
        <label class="col-auto" for="name">Предмет</label>
        <input class="form-control" type='text' name='name' id='name' value="{{ isset($subject) ? $subject->name : '' }}">
    </div>
    <div class="mt-2 row">     
        <button class="btn btn-primary" action='submit'>Сохранить</button>           
    </div>
</form>