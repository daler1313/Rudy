@extends('layouts.app') <!-- Используем layout -->

@section('content')
    <h2>Редактировать студента</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="fullname">ФИО:</label>
            <input type="text" name="fullname" id="fullname" class="form-control" value="{{ old('fullname', $student->fullname) }}" required>
        </div>

        <div class="form-group">
            <label for="kurs">Курс:</label>
            <input type="number" name="kurs" id="kurs" class="form-control" min="1" max="4" value="{{ old('kurs', $student->kurs) }}" required>
        </div>

        <div class="form-group">
            <label for="gruppa">Группа:</label>
            <input type="text" name="gruppa" id="gruppa" class="form-control" value="{{ old('gruppa', $student->gruppa) }}" required>
        </div>

        <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" name="login" id="login" class="form-control" value="{{ old('login', $student->login) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $student->email) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Оставьте пустым, чтобы сохранить текущий пароль">
        </div>

        <button type="submit" class="btn btn-warning">Сохранить изменения</button>
    </form>
@endsection
