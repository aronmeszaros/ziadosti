<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormTemplate;

class FormTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //List of templates will be displayed here
      //together with the option to create a new One
      $templates = FormTemplate::all();

      return view('admin_pane')->with('templates', $templates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_formtemplate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formtemplate = new FormTemplate;
        $formtemplate->title = $request->title;
        $formtemplate->subtitle = $request->subtitle;
        $formtemplate->intro = $request->intro;
        $formtemplate->description = $request->description;
        $formtemplate->category = $request->category;

        $formtemplate->save();

        return redirect('/formtemplate/'.$formtemplate->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formtemplate = FormTemplate::find($id);
        
        return view('add_components')->with('formtemplate', $formtemplate);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
