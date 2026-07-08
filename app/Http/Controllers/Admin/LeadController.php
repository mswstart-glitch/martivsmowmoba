<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadController extends Controller
{
    public const STATUSES = ['new', 'contacted', 'completed', 'cancelled'];

    public function index(): View
    {
        $leads = StudentRegistration::latest()->paginate(20);

        return view('admin.leads.index', [
            'leads' => $leads,
            'statuses' => self::STATUSES,
        ]);
    }

    public function updateStatus(Request $request, StudentRegistration $lead): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:' . implode(',', self::STATUSES)],
        ]);

        $lead->update($data);

        return back()->with('success', 'Lead status updated.');
    }
}
