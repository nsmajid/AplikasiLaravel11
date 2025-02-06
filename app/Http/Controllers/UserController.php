<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::join('employees', 'employees.user_id', '=', 'users.id')
            ->join('divisions', 'divisions.id', '=', 'employees.division_id')
            ->oldest('employee_code')
            ->get();
        return view('user.index', ['users' => $users]);
    }
}
