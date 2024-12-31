@extends('layouts.app')

@section('content')
    <h2>Информация о студенте</h2>

    <div class="card p-3">
        <p><strong>ID:</strong> {{ $student->id }}</p>
        <p><strong>ФИО:</strong> {{ $student->fullname }}</p>
        <p><strong>Курс:</strong> {{ $student->kurs }}</p>
        <p><strong>Группа:</strong> {{ $student->gruppa }}</p>
        <p><strong>Логин:</strong> {{ $student->login }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
    </div>

    <div class="mt-3">
        <a href="{{ route('students.index') }}" class="btn btn-primary">Назад к списку</a>
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Редактировать</a>

        <!-- Форма для кнопки "Удалить" -->
        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
        </form>
    </div>
@endsection
