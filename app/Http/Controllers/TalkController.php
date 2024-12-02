<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTalkRequest;
use App\Http\Requests\UpdateTalkRequest;
use App\Models\Talk;
use Illuminate\Support\Facades\Auth;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('talks.index', ['talks' => Auth::user()->talks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('talks.create', ['talk' => new Talk]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTalkRequest $request)
    {
        // Create talk
        Auth::user()->talks()->create($request->validated());

        return redirect()->route('talks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Talk $talk)
    {
        return view('talks.show', ['talk' => $talk]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Talk $talk)
    {
        return view('talks.edit', ['talk' => $talk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTalkRequest $request, Talk $talk)
    {
        $talk->update($request->validated());

        return redirect()->route('talks.show', ['talk' => $talk]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Talk $talk)
    {
        if ($talk->user_id === Auth::user()->id) {
            $talk->delete();
        }

        return redirect()->route('talks.index');
    }
}
