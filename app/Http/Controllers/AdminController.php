<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Note;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard()
    {
        return response()->json([
            'message' => 'Welcome to Admin Dashboard',
            'total_notes' => Note::count(),
            'total_categories' => Category::count(),
        ]);
    }

    public function profile()
    {
        $admin = Admin::first();

        return response()->json([
            'name' => $admin->name,
            'email' => $admin->email,
        ]);
    }
}