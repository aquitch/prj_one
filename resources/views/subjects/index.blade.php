@extends('layouts.app')

@section('title', 'Предметы - Главная')

@section('card')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6">
                <h5 class="card-title">Предметы - Главная</h5>
            </div>
            <div class="col-sm-6 d-flex flex-row-reverse">
                <a href="{{ route('subjects.create') }}">
                <button class="btn btn-sm btn-primary">Добавить предмет</button>
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
                    @foreach($subjects as $subject)
                        <tr class="text-center">
                            <td>                           
                                {{ $subject->name }}
                            </td>
                            <td>
                                <form method='POST' action="{{ route('subjects.destroy', $subject) }}">  
                                    @csrf
                                    @method('DELETE')   
                                    <div class="btn-group">
                                        <a class="btn btn-outline-primary" href="{{ route('subjects.show', $subject) }}">           
                                            Подробнее
                                        </a>
                                        <a class="btn btn-outline-warning" href="{{ route('subjects.edit', $subject) }}">          
                                            Редактировать
                                        </a>           
                                        <button class="btn btn-outline-danger" action="submit">Удалить</button>
                                    </div>
                                </form>
                            </td>
                        </tr>         
                    @endforeach
                </tbody>    
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-center">
            {{ $subjects->links('includes.pagination') }}
        </div>
    </div>
</div>
@endsection