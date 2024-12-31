@extends('layouts.app') <!-- Один раз в начале -->

@section('content')
    <h2>Добавить студента</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="fullname">ФИО:</label>
            <input type="text" name="fullname" id="fullname" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kurs">Курс:</label>
            <input type="number" name="kurs" id="kurs" class="form-control" min="1" max="4" required>
        </div>

        <div class="form-group">
            <label for="gruppa">Группа:</label>
            <input type="text" name="gruppa" id="gruppa" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" name="login" id="login" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
