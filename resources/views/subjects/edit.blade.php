@extends ("layouts.app")

@section('title', 'Редактор')

@section('page_title')
<h3>
    Предметы - Редактор
</h3>
@endsection

@section('sub_nav')
<h5>Редактор для предмета: {{ $subject->name }}</h5>
@endsection

@section('content')

@include('subjects.form', ['method' => 'PUT', 'action' => route('subjects.update', $subject)])

@endsection