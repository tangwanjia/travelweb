<?php

namespace App\Http\Controllers;

use App\Models\TravelWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TravelWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travelWebs = Auth::user()->travelWebs;
        return view('dashboard', ['travelWebs' => $travelWebs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //save database
        $travelWeb=new TravelWeb();
        $travelWeb->title = $request->title;
        $travelWeb->text=$request->text;
        //$travelWeb->fileToUpload=$request->fileToUpload;
        $travelWeb->user_id = Auth::id();
        $travelWeb->image=$request->image;
        $travelWeb->save();

        //return user back to dashboard
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(TravelWeb $travelWeb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TravelWeb $travelWeb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TravelWeb $travelWeb)
    {
        if (Auth::id() == $travelWeb->user_id){
            //update note
            $travelWeb->title = $request->title;
            $travelWeb->text = $request->text;
            $travelWeb->image=$request->image;
            $travelWeb->save();
            return redirect('/dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelWeb $travelWeb)
    {
        if(Auth::id() == $travelWeb->user_id){
            $travelWeb->delete();
        }

        return redirect('/dashboard');
    }
}
