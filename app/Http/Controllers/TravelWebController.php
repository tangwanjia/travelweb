<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\TravelWeb;
use Database\Seeders\CategoriesTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TravelWebController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travelWebs = Auth::user()->travelWebs;
        $categories = category::all()->pluck('category', 'id');

        return view('dashboard', ['travelWebs' => $travelWebs, 'categories' => $categories]);

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

        $file = '';

        if ($request->hasFile('image')) {


            if($request->hasFile('image')){
                $file = $request->getSchemeAndHttpHost(). '/pictures/'. time(). '.' . $request->image->extension();
                $request->image->move(public_path('/pictures/'), $file);
            }
        //save database
        $travelWeb=new TravelWeb();
        $travelWeb->title = $request->title;
        $travelWeb->text=$request->text;
        $travelWeb->category = $request->category;
        $travelWeb->user_id = Auth::id();
        $travelWeb->image=$file;
        $travelWeb->save();


        //return user back to dashboard
        return redirect('/dashboard');
    }}

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
            //update not

            $travelWeb->title = $request->title;
            $travelWeb->text = $request->text;
            $travelWeb->category = $request->category;

            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                $oldImagePath = public_path(parse_url($travelWeb->image, PHP_URL_PATH));
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
                if($request->hasFile('image')){
                    $file = $request->getSchemeAndHttpHost(). '/pictures/'. time(). '.' . $request->image->extension();
                    $request->image->move(public_path('/pictures/'), $file);
                }
                // Upload the new image

                $travelWeb->image = $file;
            }
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
