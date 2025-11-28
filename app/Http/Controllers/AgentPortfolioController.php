<?php

namespace App\Http\Controllers;

use App\Models\AccreditedAgent;
use App\Models\AgentPortfolio;
use Illuminate\Http\Request;

class AgentPortfolioController extends Controller
{
    protected function currentAgent(): AccreditedAgent
    {
        return AccreditedAgent::where('status', 'approved')->findOrFail(session('agent_id'));
    }

    public function index()
    {
        $agent = $this->currentAgent();
        $portfolios = $agent->portfolios()->orderByDesc('created_at')->get();

        return view('agent.portfolio.index', compact('agent', 'portfolios'));
    }

    public function create()
    {
        $agent = $this->currentAgent();

        return view('agent.portfolio.create', compact('agent'));
    }

    public function store(Request $request)
    {
        $agent = $this->currentAgent();

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'tags' => ['nullable', 'string', 'max:255'],
            'images.*' => ['nullable', 'image', 'max:4096'],
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imagePaths[] = $file->store('agents/portfolio', 'public');
            }
        }

        $agent->portfolios()->create([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'tags' => $data['tags'] ?? null,
            'images' => $imagePaths,
            'is_published' => true,
            'published_at' => now(),
        ]);

        return redirect()->route('agent.portfolio.index')->with('status', 'Portfolio item added.');
    }

    public function edit(AgentPortfolio $portfolio)
    {
        $agent = $this->currentAgent();

        abort_unless($portfolio->accredited_agent_id === $agent->id, 403);

        return view('agent.portfolio.edit', compact('agent', 'portfolio'));
    }

    public function update(Request $request, AgentPortfolio $portfolio)
    {
        $agent = $this->currentAgent();
        abort_unless($portfolio->accredited_agent_id === $agent->id, 403);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'tags' => ['nullable', 'string', 'max:255'],
            'images.*' => ['nullable', 'image', 'max:4096'],
        ]);

        $imagePaths = $portfolio->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imagePaths[] = $file->store('agents/portfolio', 'public');
            }
        }

        $portfolio->update([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'tags' => $data['tags'] ?? null,
            'images' => $imagePaths,
        ]);

        return redirect()->route('agent.portfolio.index')->with('status', 'Portfolio item updated.');
    }

    public function destroy(AgentPortfolio $portfolio)
    {
        $agent = $this->currentAgent();
        abort_unless($portfolio->accredited_agent_id === $agent->id, 403);

        $portfolio->delete();

        return redirect()->route('agent.portfolio.index')->with('status', 'Portfolio item deleted.');
    }
}
