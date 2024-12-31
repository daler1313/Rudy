<?php

namespace App\Http\Controllers; // Добавляем пространство имён

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Метод для отображения всех студентов
    public function index()
    {
        $students = Student::all(); // Получаем всех студентов
        return view('students.index', compact('students')); // Передаем в представление
    }
    
    // Метод для отображения формы создания студента
    public function create()
    {
        return view('students.create');
    }

    // Метод для сохранения студента
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'kurs' => 'required|integer|between:1,4',
            'gruppa' => 'required|string|max:50',
            'login' => 'required|string|max:50|unique:students',
            'email' => 'required|email|regex:/@gmail\.com$/|unique:students',
            'password' => 'required|string|min:8',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']); // Хэшируем пароль
        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Студент успешно создан');
    }

    // Метод для отображения конкретного студента
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    // Метод для отображения формы редактирования
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Метод для обновления информации о студенте
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'kurs' => 'required|integer|between:1,4',
            'gruppa' => 'required|string|max:50',
            'login' => 'required|string|max:50|unique:students,login,' . $id,
            'email' => 'required|email|regex:/@gmail\.com$/|unique:students,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $student = Student::findOrFail($id);
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Информация о студенте обновлена');
    }

    // Метод для удаления студента
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Студент удалён');
    }
}
