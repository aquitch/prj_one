@extends ("layouts.app")

@section('title', 'Добавить новый предмет')

@section('page_title')
<h3>
    Предметы - Создать
</h3>
@endsection

@section('content')

@include('subjects.form', ['method' => 'POST', 'action' => route('subjects.store')])

@endsection

