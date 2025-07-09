<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ad::where('user_id', Auth::id())->get();
        return view('ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'categories' => ['nullable', 'string'],
            'rate' => ['nullable', 'numeric'],
            'zone' => ['nullable', 'string'],
            'languages' => ['nullable', 'string'],
        ]);

        $data['user_id'] = Auth::id();

        Ad::create($data);

        return redirect()->route('ads.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        return view('ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        if ($ad->user_id !== Auth::id()) {
            abort(403);
        }
        return view('ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        if ($ad->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'categories' => ['nullable', 'string'],
            'rate' => ['nullable', 'numeric'],
            'zone' => ['nullable', 'string'],
            'languages' => ['nullable', 'string'],
            'active' => ['nullable', 'boolean'],
        ]);

        $ad->update($data);

        return redirect()->route('ads.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        if ($ad->user_id !== Auth::id()) {
            abort(403);
        }

        $ad->delete();

        return redirect()->route('ads.index');
    }
}
