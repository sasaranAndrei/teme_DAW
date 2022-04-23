<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealEstate;

class RealEstatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $property_type = $request->query->get('property_type');
        // dd($property_type);
        
        if (is_null($property_type)){
            $real_estates = RealEstate::all();
        }
        else {
            $real_estates = RealEstate::where('property_type', $property_type)->get();
        }
        
        $property_types = RealEstate::$PROPERTY_TYPES;

        return view('real_estates.index', compact('real_estates'))->with('property_types', $property_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('real_estates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        RealEstate::create($request->all());
        return redirect()->route('real_estates.index')
                        ->with('success','Real Estate created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $real_estate = RealEstate::find($id);

        return view('real_estates.show', compact('real_estate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $real_estate = RealEstate::find($id);

        return view('real_estates.edit', compact('real_estate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealEstate $real_estate)
    {  
        $real_estate->update($request->all());

        return redirect()->route('real_estates.index')
                        ->with('success','Real Estate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealEstate $real_estate)
    {
        $real_estate->delete();

        return redirect()->route('real_estates.index')
                        ->with('success','Real Estate deleted successfully');
    }

    public function booking($id)
    {
        $user_id = auth()->user()->id;
        
    }
}
