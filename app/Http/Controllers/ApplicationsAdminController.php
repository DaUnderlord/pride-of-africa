<?php

namespace App\Http\Controllers;

use App\Models\ModelApplication;
use Illuminate\View\View;

class ApplicationsAdminController extends Controller
{
    public function index(): View
    {
        $applications = ModelApplication::latest()->paginate(20);

        return view('admin.applications.index', [
            'applications' => $applications,
        ]);
    }
}
