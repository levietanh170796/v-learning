<?php

namespace App\Http\Controllers;

use App\ContestRound;
use App\Http\Requests\ContestRoundRequest;

class ContestRoundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contest_rounds = ContestRound::paginate(10);
        return view('contest_rounds.index', compact('contest_rounds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contest_rounds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContestRoundRequest $request)
    {
        ContestRound::create($request->all());
        return redirect()->route('contest_rounds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContestRound  $contestRound
     * @return \Illuminate\Http\Response
     */
    public function show(ContestRound $contest_round)
    {
        return view('contest_rounds.show', compact('contest_round'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContestRound  $contestRound
     * @return \Illuminate\Http\Response
     */
    public function edit(ContestRound $contest_round)
    {
        return view('contest_rounds.edit', compact('contest_round'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContestRound  $contestRound
     * @return \Illuminate\Http\Response
     */
    public function update(ContestRoundRequest $request, ContestRound $contestRound)
    {
        $contestRound->update($request->all());

        return redirect()->route('contest_rounds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContestRound  $contestRound
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContestRound $contestRound)
    {
        $contestRound->delete();
        return redirect()->route('contest_rounds.index');
    }
}
