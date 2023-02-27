<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Http\Requests\PlatFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PlatController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {

        Log::alert('request for index  ');
        return view('plats.menu', ['plats'=>Plat::all()]); // paginate(10)
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function showPlatsDeleted()
    {
        Log::alert('showing Plat deleted ');
        $plats = Plat::onlyTrashed()->get();
        return view('plats.trash-list',['plats'=>$plats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        Log::alert(' request for creating new  plat');
        return view('plats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PlatFormRequest $request
     * @return RedirectResponse
     */
    public function store(PlatFormRequest $request)
    {
        $platValid = $request->validated();
        Log::alert('storing plat ' . json_encode($platValid) );

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

        Log::alert('request for showing plat = ' . $plat);
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
        Log::alert('request for edit plat = ' . $plat);
        return view('plats.edit',['plat'=>$plat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PlatFormRequest $request
     * @param Plat $plat
     * @return RedirectResponse
     */
    public function update(PlatFormRequest $request, Plat $plat)
    {
        $validated = $request->validated();
        Log::alert('request for updating plat = ' . $plat->toJson() . 'to'. json_encode($validated));

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

    public function restore($id)
    {

        Log::info('Restoring Plats with id :' . $id);
        try {
            Plat::where('id', $id)->withTrashed()->restore();

            return redirect()->route('plats.index')
                ->with('success', 'Plat has been restored successfully.');
        } catch (\Exception $e) {
            Log::error('Error in restore Plats '.$e->getMessage());
            return redirect()->back()
                ->withErrors(['error'=> "Error in restoring plat"]);
        }
    }

    /**
     * Force delete user data
     *
     * @param numeric $plat
     *
     * @return RedirectResponse
     */
    public function forceDelete($id)
    {
        Log::info('forece delete Plats with is : '.$id);
        try {
            Plat::where('id', $id)->withTrashed()->forceDelete();

            return redirect()->route('plats.index')
                ->with('success', 'Plat force deleted successfully.');
        } catch (\Exception $e) {

            Log::error('Error in restore Plats '.$e->getMessage());
            return redirect()->back()
                ->withErrors(['error'=> "Error in deleting plat: {$e->getMessage()}"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Plat $plat
     * @return RedirectResponse
     */
    public function destroy( Plat $plat )
    {
        Log::info('Deleting Plats :' . $plat);

        $plat->delete();
        return redirect()->route('plats.index')
            ->with(['success'=>'Plat has been moved to trash']);
    }
}
