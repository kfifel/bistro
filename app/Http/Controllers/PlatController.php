<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Http\Requests\PlatFormRequest;
use Illuminate\Http\Response;

class PlatController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('plats.menu', ['plats'=>Plat::all()]); // paginate(10)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('plats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PlatFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PlatFormRequest $request)
    {
        $platValid = $request->validated();

        $platValid['image'] = $request->file('image')->store('public/images/plats');
        $platValid['image'] =str_replace("public/images", "storage/images", $platValid['image']);

        $plat = $request->user()->plats()->create($platValid);

        return redirect()
            ->route('plats.show', [$plat])
            ->with('success', 'Plat has been added title = '.$plat->title. // this data well push in a temporary session
                ' and description = '. $plat->description );
    }

    /**
     * Display the specified resource.
     *
     * @param Plat $plat
     * @return Response
     */
    public function show(Plat $plat)
    {
        return view('plats.show', ['plat'=>$plat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Plat $plat
     * @return Response
     */
    public function edit( Plat $plat)
    {
        return view('plats.edit',['plat'=>$plat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PlatFormRequest $request
     * @param Plat $plat
     * @return Response
     */
    public function update(PlatFormRequest $request, Plat $plat)
    {
        $validated = $request->validated();

        if($request->file('image')){
            $oldImagePath = str_replace("storage/images/plats/", "public/images/plats/", $plat->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $validated['image'] = $request->file('image')->store('public/images/plats');
            $validated['image'] = str_replace("public/images", "storage/images", $validated['image']);
        }

        $plat->update($validated);

        return redirect()
            ->route('plats.show', [$plat])
            ->with('success', 'Plat is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Plat $plat
     * @return Response
     */
    public function destroy( Plat $plat )
    {
        $plat->delete();
        return redirect()->route('plats.index');
    }
}
