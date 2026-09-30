<?php
namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Employee;
use Illumionate\Http\Request;

class TaskController extends Controller {
    public function index() {
        $tasks = Task::with('employee')->latest()->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }
    public function create() {
        $employees = Employee::all();
        return view('tasks.create', ['employees' => $employees]);
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'emplloyee_id' => 'required|exists:employees,id',
        ]);
        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'تمت إضافة المهمة بنجاح');
    }
    public function updateStatus(Task $task, Request $request) {
        $task->update(['status' => $request->input('status')]);
        return redirect()->route('tasks.index')->with('success', 'تم تحديث حالة المهمة');
    } 
    public function destroy(Task $task) {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'تم حذف المهمة');
    }
}