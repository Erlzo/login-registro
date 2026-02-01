<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $users = User::all();
            return view('dashboard.admin', ['users' => $users]);
        }

        return view('dashboard.user', ['user' => $user]);
    }
}
