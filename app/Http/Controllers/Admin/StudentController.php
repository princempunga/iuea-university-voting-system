<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of registered students.
     */
    public function index()
    {
        $students = User::where('role', 'student')
            ->orderBy('name')
            ->paginate(15);

        return view('admin.students.index', compact('students'));
    }
}
