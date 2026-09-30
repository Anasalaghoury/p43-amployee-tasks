@extends('layouts.app')
@section('title', 'قائمة المهام')
@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <h2>كل المهام</h2>
        <a href="{{ route('tasks.create') }}">+ مهمة جديدة</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>المهمة</th>
                <th>الموظف المسؤول</th>
                <th>تاريخ الاستحقاق</th>
                <th>الحالة</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->employee->name }}</td>
                <td>{{ $task->due_date ?? 'غير محدد' }}</td>
                <td><span class="badge badge-{{ $task->status }}">{{ $task->status }}</span></td>
                <td>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('هل انت متأكد من الحذف ؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection