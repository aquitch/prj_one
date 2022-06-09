@extends ("layouts.app")

@section('title', 'Группы - Главная')

@section('card')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6">
                <h5 class="card-title">Группы - Главная</h5>
            </div>
            <div class="col-sm-6 d-flex flex-row-reverse">
                <a href="{{ route('groups.create') }}">
                <button class="btn btn-sm btn-primary">Добавить группу</button>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="text-center">
                    <th>Предметы</th>
                    <th>Действия</th>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr class="text-center">
                        <td>             
                            {{ $group->name }}
                        </td>
                        <td>
                            <form method='POST' action="{{ route('groups.destroy', $group) }}">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group">
                                    <a class="btn btn-outline-primary" href="{{ route('groups.show', $group) }}">         
                                        Подробнее
                                    </a>
                                    <a class="btn btn-outline-warning" href="{{ route('groups.edit', $group) }}">          
                                    Редактировать
                                    </a>        
                                    <button class="btn btn-outline-danger" action="submit">Удалить</button>
                                </div>
                            </form>               
                        </td>
                    </tr>         
                @endforeach
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-center">
            {{ $groups->links('includes.pagination') }}
        </div>
    </div>
</div>
@endsection