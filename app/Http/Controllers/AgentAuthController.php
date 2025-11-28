<?php

namespace App\Http\Controllers;

use App\Models\AccreditedAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentAuthController extends Controller
{
    public function showLogin()
    {
        return view('agent.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $agent = AccreditedAgent::where('email', $credentials['email'])->where('status', 'approved')->first();

        if (! $agent || ! $agent->password || ! Hash::check($credentials['password'], $agent->password)) {
            return back()->withErrors(['email' => 'Invalid credentials or account not approved yet.'])->withInput();
        }

        session(['agent_id' => $agent->id]);

        return redirect()->route('agent.portfolio.index');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('agent_id');

        return redirect()->route('agent.login.show');
    }
}
