<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Http\Requests\PlatFormRequest;
use App\Http\Requests\UpdatePlatRequest;
use http\Client\Request;

class PlatController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plats.menu', ['plats'=>Plat::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PlatFormRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PlatFormRequest $request)
    {
        $platValid = $request->validated();

        $platValid['image'] = $request->file('image')->store('public/images');

        $plat = $request->user()->plats()->create($platValid);

        return redirect()
            ->route('plats.show', [$plat])
            ->with('success', 'Plat has been added title = '.$plat->title. // this data well push in a temporary session
                ' and description = '. $plat->description );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function show(Plat $plat)
    {
        return view('plats.show', ['plat'=>$plat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function edit(Plat $plat)
    {
        return view('plats.edit',['plat'=>$plat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlatRequest  $request
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function update(PlatFormRequest $request, Plat $plat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plat $plat)
    {
        //
    }
}
