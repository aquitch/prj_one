@extends ("layouts.app")

@section('title', 'Студенты - Главная')

@section('card')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6">
                <h5 class="card-title">Студенты - Главная</h5>
            </div>
            <div class="col-sm-6 d-flex flex-row-reverse">
                <a href="{{ route('students.create') }}">
                <button class="btn btn-sm btn-primary">Добавить студента</button>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">       
        <div class="table-responsive">
            <table class="table">
                <thead class="text-center">
                    <th>Студенты</th>
                    <th>Действия</th>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr class="text-center">
                        <td>            
                            {{ $student->name }}
                        </td>
                        <td>
                            <form method='POST' action="{{ route('students.destroy', $student) }}">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a class="btn btn-outline-info" href="{{ route('students.show', $student) }}">         
                                        Подробнее
                                    </a>
                                    <a class="btn btn-outline-warning" href="{{ route('students.edit', $student) }}">          
                                    Редактировать
                                    </a>                  
                                    <button class="btn btn-outline-danger" action="submit">Удалить</button>
                                </div>
                            </form>
                        </td>     
                    </tr>         
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-center">
            {{ $students->links('includes.pagination') }}
        </div>
    </div>
</div>
@endsection