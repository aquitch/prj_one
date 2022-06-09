@extends ("layouts.app")

@section('title', 'Группа - Просмотр')

@section('page_title')
<h3>
        Группа - Просмотр     
</h3>
@endsection

@section('sub_nav')
        <h5>Подробнее о группе: {{ $group->name }}</h5>
@endsection

@section('content')
<div class="mb-4 mt-4 container-sm jutify-content-center">
        <div class="table-responsive">
                <table class="table table-hover justify-content-center">
                        <tr>
                                <th class="text-center">
                                        ID группы: 
                                </th>
                                <td class="text-center">
                                        {{ $group->id }} <br>
                                </td>
                        </tr>
                        <tr>
                                <th class="text-center">
                                        Название группы: 
                                </th>
                                <td class="text-center">
                                        {{ $group->name }} <br>
                                </td>
                        </tr>
                        <tr>
                                <th class="text-center">
                                        Создана: 
                                </th>
                                <td class="text-center">
                                        {{ $group->created_at }} <br>
                                </td>
                        </tr>
                        <tr>
                                <th class="text-center">
                                        Изменена: 
                                </th>
                                <td class="text-center">
                                        {{ $group->updated_at }} <br>
                                </td>
                        </tr>
                </table>
        </div>
</div>
@endsection