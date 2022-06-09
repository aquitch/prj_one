@extends ("layouts.app")

@section('title', 'Редактор')

@section('page_title')
<h3>
    Студенты - Редактор
</h3>
@endsection

@section('sub_nav')
<h5>Редактор для студента: {{ $student->name }}</h5>
@endsection

@section('content')

@include('students.form', ['method' => 'PUT', 'action' => route('students.update', $student)])

@endsection