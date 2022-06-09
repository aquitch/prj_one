@extends ("layouts.app")

@section('title', 'Студент - Просмотр')

@section('page_title')
<h3>
        Студент - Просмотр     
</h3>
@endsection

@section('sub_nav')
        <h5>Подробнее о Студенте: {{ $student->name }}</h5>
@endsection

@section('content')
<div class="mb-4 mt-4 container-sm jutify-content-center">
        <div class="table-responsive">
                <table class="table table-hover justify-content-center">
                        <tr>
                                <th class="text-center">
                                        ID студента: 
                                </th>
                                <td class="text-center">
                                        {{ $student->id }} <br>
                                </td>
                        </tr>
                        <tr>
                                <th class="text-center">
                                        Имя студента: 
                                </th>
                                <td class="text-center">
                                        {{ $student->name }} <br>
                                </td>
                        </tr>
                        <tr>
                                <th class="text-center">
                                        Дата рожения: 
                                </th>
                                <td class="text-center">
                                        {{ $student->bday }} <br>
                                </td>
                        </tr>
                        <tr>
                                <th class="text-center">
                                        Группа: 
                                </th>
                                <td class="text-center">
                                        {{ $student->group->name }} <br>
                                </td>
                        </tr>
                        <tr>
                                <th class="text-center">
                                        Создан: 
                                </th>
                                <td class="text-center">
                                        {{ $student->created_at }} <br>
                                </td>
                        </tr>
                        <tr>
                                <th class="text-center">
                                        Изменён: 
                                </th>
                                <td class="text-center">
                                        {{ $student->updated_at }} <br>
                                </td>
                        </tr>
                </table>
        </div>
</div>
<div class="mt-4 d-flex justify-content-center">
        <a class="btn btn-primary" role="button" href="{{ route('marks.create', $student) }}">
                Добавить оценку
        </a>
</div>
<div class="mb-4 mt-4 container-sm jutify-content-center">
        <div class="table-responsive">
                <table class="table">
                        <thead class="text-center">
                                <th>Предмет</th>
                                <th>Оценка</th>
                                <th colspan="2">Действия</th>
                        </thead>
                        @foreach ($student->subjects as $subject)
                        <tr class="text-center">
                                <td>
                                        {{ $subject->name }}
                                </td>
                                
                                <td>
                                        {{ $subject->pivot->mark ?? 'Ошибка! Оценка не найдена.' }}
                                </td>
                                <td>
                                        <div class="btn-group">
                                                <a class="btn btn-sm btn-outline-warning" role="button" href="{{ route('marks.edit', compact('student', 'subject')) }}">
                                                        Изменить
                                                </a>
                                                <form method="POST" action="{{ route('students.subjects.destroy', compact('student', 'subject')) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-outline-danger" type="submit">Удалить</button>
                                                </form>
                                        </div>
                                </td>
                                
                        </tr>
                        @endforeach
                </table>
        </div>
</div>
@foreach ($student->subjects as $subject)
    {{ $subject->mark }}
@endforeach

@endsection
