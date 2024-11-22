<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        $stats = [
            'total_books' => Book::count(),
            'total_users' => User::count(),
            'total_categories' => Category::count(),
            'low_stock_books' => Book::where('stock', '<', 5)->count(),
        ];

        $recent_books = Book::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_books'));
    }
}
