@extends('layouts.app')

@section('title', 'Журнал оценок')
    
@section('card')
    <div class="card">
        <div class="card-header text-center">
            <h5 class="card-title">Журнал оценок</h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Все студенты</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Средний балл - Группы</button>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Отличники</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Хорошисты</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Что-то ещё</button>
                </li>
              </ul>
              <!-- Все студенты -->
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-center">
                                <th>Имя</th>
                                @foreach ($subjects as $name)
                                    <th>{{ $name->name }}</th>
                                @endforeach
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr class="text-center">
                                    <td>             
                                        {{ $student->name }}
                                    </td>
                                    @foreach ($student->subjects as $subject)    
                                            <td>
                                                {{  $subject->pivot->mark ?? '-'  }}
                                            </td>
                                    @endforeach
                                </tr>         
                            @endforeach
                        </table>  
                    </div>
                </div>
                <!-- Средний балл - Группы -->
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                Средний балл
                </div>
                <!-- Отличники -->
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-center">
                                <th>Имя</th>
                                @foreach ($subjects as $subject)
                                    <th>{{ $subject->name }}</th>
                                @endforeach
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr class="text-center">
                                    <td>             
                                        {{ $group->name }}
                                    </td>
                                       
                                            <td>
                                               
                                            </td>
                                    
                                </tr>         
                            @endforeach
                        </table>  
                    </div>
                </div>
                <!-- Хорошисты -->
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-center">
                                <th>Имя</th>
                                @foreach ($subjects as $name)
                                    <th>{{ $name->name }}</th>
                                @endforeach
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr class="text-center">
                                    <td>             
                                        {{ $student->name }}
                                    </td>
                                    @foreach ($student->subjects as $subject)    
                                            <td>
                                                {{  $subject->pivot->mark ?? '-' }}
                                            </td>
                                    @endforeach
                                </tr>         
                            @endforeach
                        </table>  
                    </div>
                </div>
                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">Эй, ты как тут оказался?</div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{ $students->links('includes.pagination') }}
            </div>
        </div>
    </div>  
@endsection