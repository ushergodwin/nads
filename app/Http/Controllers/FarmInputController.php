<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FarmInput;
use App\Http\Requests\FarmInputs\Index;
use App\Http\Requests\FarmInputs\Show;
use App\Http\Requests\FarmInputs\Create;
use App\Http\Requests\FarmInputs\Store;
use App\Http\Requests\FarmInputs\Edit;
use App\Http\Requests\FarmInputs\Update;
use App\Http\Requests\FarmInputs\Destroy;


/**
 * Description of FarmInputController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class FarmInputController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.farm_inputs.index', ['records' => FarmInput::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  FarmInput  $farminput
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, FarmInput $farminput)
    {
        return view('pages.farm_inputs.show', [
                'record' =>$farminput,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('pages.farm_inputs.create', [
            'model' => new FarmInput,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new FarmInput;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'FarmInput saved successfully');
            return redirect()->route('farminputs.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving FarmInput');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  FarmInput  $farminput
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, FarmInput $farminput)
    {

        return view('pages.farm_inputs.edit', [
            'model' => $farminput,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  FarmInput  $farminput
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,FarmInput $farminput)
    {
        $farminput->fill($request->all());

        if ($farminput->save()) {
            
            session()->flash('app_message', 'FarmInput successfully updated');
            return redirect()->route('farminputs.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating FarmInput');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  FarmInput  $farminput
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, FarmInput $farminput)
    {
        if ($farminput->delete()) {
                session()->flash('app_message', 'FarmInput successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting FarmInput');
            }

        return redirect()->back();
    }
}
