@extends ("layouts.app")

@section('title', 'Редактор')

@section('page_title')
<h3>
    Группы - Редактор
</h3>
@endsection

@section('sub_nav')
<h5>Редактор для группы: {{ $group->name }}</h5>
@endsection

@section('content')

@include('groups.form', ['method' => 'PUT', 'action' => route('groups.update', $group)])

@endsection