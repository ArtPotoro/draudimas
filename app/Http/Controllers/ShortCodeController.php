<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use App\Models\ShortCode;
use App\Models\User;
use Illuminate\Http\Request;

class ShortCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortCodes=ShortCode::all();
        return view("shortcodes.index",['shortcodes'=>$shortCodes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners=Owner::all();
        return view('shortcodes.create',['owners'=>$owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shortCodes=new ShortCode();
        $shortCodes->shortcode=$request->shortcode;
        $shortCodes->replace=$request->replace;
        $shortCodes->save();
        return redirect()->route('shortcodes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShortCode  $shortCode
     * @return \Illuminate\Http\Response
     */
    public function show(ShortCode $shortCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShortCode  $shortCode
     * @return \Illuminate\Http\Response
     */
    public function edit(ShortCode $shortCode)
    {
//        $shortCode=ShortCode::find($shortCode);
        return view('shortcodes.update', ['shortcodes'=>$shortCode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShortCode  $shortCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ShortCode  $shortCode)
    {
        //$shortCode=ShortCode::find($shortCode);
        $shortCode->shortcode=$request->shortcode;
        $shortCode->replace=$request->replace;
        $shortCode->save();
        return redirect()->route('shortcodes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShortCode  $shortCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShortCode $shortCode)
    {
        $shortCode->delete();
        return redirect()->route('shortcodes.index');
    }
}
