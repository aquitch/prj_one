@extends ("layouts.app")

@section('title', 'Добавить оценку')

@section('page_title')
<h3>
    Добавить оценку
</h3>
@endsection

@section('content')

@include('marks.form', ['method' => 'POST', 'action' => route('students.subjects.store', $student)])

@endsection 