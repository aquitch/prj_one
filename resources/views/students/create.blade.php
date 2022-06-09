@extends ("layouts.app")

@section('title', 'Добавить нового студента')

@section('page_title')
<h3>
    Студент - Создать
</h3>
@endsection

@section('content')

@include('students.form', ['method' => 'POST', 'action' => route('students.store')])

@endsection

