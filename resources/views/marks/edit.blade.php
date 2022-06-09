@extends ("layouts.app")

@section('title', 'Редактировать оценку')

@section('page_title')
<h3>
    Редактировать оценку по предмету {{ $subject->name }}
</h3>
@endsection

@section('content')

@include('marks.form', ['method' => 'PUT', 'action' => route('students.subjects.update', compact('student', 'subject'))])

@endsection 