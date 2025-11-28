<?php

namespace App\Http\Controllers;

use App\Models\AccreditedAgent;
use Illuminate\Http\Request;

class AccreditedAgentController extends Controller
{
    public function index()
    {
        $agents = AccreditedAgent::where('status', 'approved')
            ->withCount('portfolios')
            ->orderBy('agency_name')
            ->orderBy('name')
            ->paginate(12);

        return view('agents.index', compact('agents'));
    }

    public function show(AccreditedAgent $agent)
    {
        abort_unless($agent->status === 'approved', 404);

        $portfolios = $agent->portfolios()
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->get();

        return view('agents.show', compact('agent', 'portfolios'));
    }

    public function create()
    {
        return view('agents.apply');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'agency_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:accredited_agents,email'],
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'city' => ['nullable', 'string', 'max:100'],
            'country' => ['nullable', 'string', 'max:100'],
            'bio' => ['nullable', 'string'],
            'website' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
        ]);

        AccreditedAgent::create([
            'name' => $data['name'],
            'agency_name' => $data['agency_name'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'whatsapp' => $data['whatsapp'] ?? null,
            'city' => $data['city'] ?? null,
            'country' => $data['country'] ?? null,
            'bio' => $data['bio'] ?? null,
            'website' => $data['website'] ?? null,
            'instagram' => $data['instagram'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('agents.apply')->with('status', 'Your request has been received. The agency will contact you once approved.');
    }
}
