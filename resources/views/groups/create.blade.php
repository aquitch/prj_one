@extends ("layouts.app")

@section('title', 'Добавить новую группу')

@section('page_title')
<h3>
    Группы - Создать
</h3>
@endsection

@section('content')

@include('groups.form', ['method' => 'POST', 'action' => route('groups.store')])

@endsection

