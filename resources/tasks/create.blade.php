@extends ('layouts.app')
@section('title', 'إضافة تهمة جديدة')
@section('content')
    <h2>إضافة تهمة جديدة</h2>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf 
        <label>عنوان المهمة</label>
        <input type="text" name="title" value="{{ old('title') }}" required>
        @error('title') <p style="color: red;">{{ $message }}</p> @enderror 
        <label>الوصف</label>
        <textarea name="description">{{ old('description') }}</textarea>
        <label>تاريخ الاستحقاق</label>
        <input type="date" name="due_date">
        <label>الموظف المسؤول</label>
        <select name="employee_id" required>
            <option value="">-- اختر موظفا --</option>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }} - {{ $employee->department }}</option>
            @endforeach
        </select>
        <button type="submit">حفظ المهمة</button>
    </form>
@endsectiont
