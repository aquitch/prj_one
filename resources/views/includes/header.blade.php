<nav class="mt-2 nav bg-dark">
    <div class="nav container-sm justify-content-center">
        <a class="nav-link text-light" href="{{ route('welcome') }}">Главная</a>
        <a class="nav-link text-light" href="{{ route('groups.index') }}">Группы</a>
        <a class="nav-link text-light" href="{{ route('subjects.index') }}">Предметы</a>
        <a class="nav-link text-light" href="{{ route('students.index') }}">Студенты</a>
        <a class="nav-link text-light" href="{{ route('gradebook.index') }}">Журнал оценок</a>
        <a class="nav-link disabled">Вход</a>
    </div>
</nav>