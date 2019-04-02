<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ziadost;

class ZiadostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_ziadost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ziadost = new Ziadost;
        $ziadost->user_id = auth()->user()->id;
        $ziadost->initiative_title = $request->input('initiative_title');
        $ziadost->call = $request->input('call');
        $ziadost->period = $request->input('period');
        $ziadost->date_start = $request->input('date_start');
        $ziadost->date_end = $request->input('date_end');

        $ziadost->save();

        return view('edit_ziadost')->with('ziadost', $ziadost)->with('success', 'Saved');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ziadost = Ziadost::find($id);
      return view('edit_ziadost')->with('ziadost', $ziadost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $ziadost = Ziadost::find($id);
      $ziadost->user_id = auth()->user()->id;
      $ziadost->initiative_title = $request->input('initiative_title');
      $ziadost->call = $request->input('call');
      $ziadost->period = $request->input('period');
      $ziadost->date_start = $request->input('date_start');
      $ziadost->date_end = $request->input('date_end');

      $ziadost->save();

      return view('edit_ziadost')->with('ziadost', $ziadost)->with('success', 'Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $ziadost = Ziadost::find($id);

      $ziadost->delete();


      return redirect('/home')->with('success', 'Deleted');
    }
}
