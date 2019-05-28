<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ziadost;
use App\Person;
use App\FormTemplate;

class ZiadostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

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
        $templates = FormTemplate::all();

        return view('create_ziadost')->with('templates', $templates);
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
        $ziadost->title = $request->input('title');
        $ziadost->template_id = $request->input('template_id');

        $ziadost->save();

        return redirect('ziadost/'.$ziadost->id.'/edit');
    }
/*
    public function store2(Request $request)
    {
      $ziadost = Ziadost::find($request->input('id'));

      $applicant = $ziadost->applicant;
      $statutory_representative = $applicant->person->first();
      $applicant->regisration_number = $request->input('registration_number');

      //$applicant->contact_person_id
      //$applicant->partner_description
      //$applicant->num_participants
      //$applicant->potential_partner_id
      //$applicant->partner_contact_person_id
      //$applicant->partner_communication
      //$applicant->partner_involvement
      $applicant->save();

      $statutory_representative->name = $request->input('full_legal_name');
      $statutory_representative->legal_form = $request->input('legal_form1');
      //$statutory_representative->name = $request->input('statutory_representative_name');
      $statutory_representative->street = $request->input('statutory_street');
      $statutory_representative->postal_code = $request->input('statutory_postal_code');
      $statutory_representative->town = $request->input('statutory_town');
      $statutory_representative->country = $request->input('statutory_country');
      $statutory_representative->save();

      return view('edit_ziadost')->with('ziadost', $ziadost)->with('success2', 'Saved');
    }
    */

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
      $formtemplate = FormTemplate::find($ziadost->template_id);
      return view('edit_ziadost')->with('ziadost', $ziadost)->with('formtemplate', $formtemplate);
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
      $ziadost->title = $request->input('title');
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
