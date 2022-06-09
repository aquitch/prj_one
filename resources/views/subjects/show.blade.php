@extends ("layouts.app")

@section('title', 'Предмет - Просмотр')

@section('page_title')
<h3>
        Предмет - Просмотр     
</h3>
@endsection

@section('sub_nav')
        <h5>Подробнее о предмете: {{ $subject->name }}</h5>
@endsection

@section('content')
<div class="mb-4 mt-4 container-sm jutify-content-center">
        <div class="table-responsive">
                <table class="table table-hover justify-content-center">
                        <tr>
                                <th class="text-center">
                                        ID предмета: 
                                </th>
                                <td class="text-center">
                                        {{ $subject->id }} <br>
                                </td>
                        </tr>
                        <tr>
                                <th class="text-center">
                                        Название предмета: 
                                </th>
                                <td class="text-center">
                                        {{ $subject->name }} <br>
                                </td>
                        </tr>
                        <tr>
                                <th class="text-center">
                                        Создана: 
                                </th>
                                <td class="text-center">
                                        {{ $subject->created_at }} <br>
                                </td>
                        </tr>
                        <tr>
                                <th class="text-center">
                                        Изменена: 
                                </th>
                                <td class="text-center">
                                        {{ $subject->updated_at }} <br>
                                </td>
                        </tr>
                </table>
        </div>
</div>

@endsection