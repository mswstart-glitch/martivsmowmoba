<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\News;
use App\Models\Review;
use App\Models\StudentRegistration;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'leads_total' => StudentRegistration::count(),
            'leads_new' => StudentRegistration::where('status', 'new')->count(),
            'news_total' => News::count(),
            'instructors_total' => Instructor::count(),
            'reviews_total' => Review::count(),
        ];

        $latestLeads = StudentRegistration::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestLeads'));
    }
}
