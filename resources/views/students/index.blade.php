@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4">Список студентов</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Курс</th>
                <th>Группа</th>
                <th>Логин</th>
                <th>Email</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->fullname }}</td>
                    <td>{{ $student->kurs }}</td>
                    <td>{{ $student->gruppa }}</td>
                    <td>{{ $student->login }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <!-- Кнопка "Показать" -->
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">Показать</a>

                        <!-- Кнопка "Редактировать" -->
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Редактировать</a>

                        <!-- Форма для кнопки "Удалить" -->
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
