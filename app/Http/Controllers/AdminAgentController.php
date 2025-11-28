<?php

namespace App\Http\Controllers;

use App\Models\AccreditedAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminAgentController extends Controller
{
    public function index()
    {
        $agents = AccreditedAgent::orderByRaw("FIELD(status, 'pending', 'approved', 'suspended')")
            ->orderBy('agency_name')
            ->orderBy('name')
            ->paginate(20);

        return view('admin.agents.index', compact('agents'));
    }

    public function show(AccreditedAgent $agent)
    {
        $agent->load('portfolios');

        return view('admin.agents.show', compact('agent'));
    }

    public function approve(Request $request, AccreditedAgent $agent)
    {
        $passwordPlain = Str::random(10);
        $agent->status = 'approved';
        $agent->password = Hash::make($passwordPlain);
        $agent->save();

        return back()->with('status', 'Agent approved. Temporary password: '.$passwordPlain);
    }

    public function suspend(Request $request, AccreditedAgent $agent)
    {
        $agent->status = 'suspended';
        $agent->save();

        return back()->with('status', 'Agent suspended.');
    }
}
