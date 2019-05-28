<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ziadost;
use App\FormTemplate;
use App\FormComponents;
use App\Data;


class DataController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $ziadost = Ziadost::find($request->input('ziadost_id'));
      $formtemplate = FormTemplate::find($ziadost->template_id);
      $components = $formtemplate->formcomponents->all();

      foreach ($components as $component) {
        $data = new Data;
        $data->type = $component->type;
        $data->name = $component->name;
        $data->caption = $component->caption;
        $data->values = $component->values;
        $data->various_data = $request->input($component->name);
        $data->ziadost_id = $ziadost->id;
        $data->save();

      }

        return redirect('/data/'.$ziadost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $ziadost = Ziadost::find($id);
      $formtemplate = FormTemplate::find($ziadost->template_id);
      $data = $ziadost->data;

      return view('show_data')->with('formtemplate', $formtemplate)->with('data',$data);
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
