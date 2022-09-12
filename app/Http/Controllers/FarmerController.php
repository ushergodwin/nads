<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Http\Requests\Farmers\Index;
use App\Http\Requests\Farmers\Show;
use App\Http\Requests\Farmers\Create;
use App\Http\Requests\Farmers\Store;
use App\Http\Requests\Farmers\Edit;
use App\Http\Requests\Farmers\Update;
use App\Http\Requests\Farmers\Destroy;
use App\Models\User;

/**
 * Description of FarmerController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class FarmerController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.farmers.index', ['records' => Farmer::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Farmer $farmer)
    {
        return view('pages.farmers.show', [
                'record' =>$farmer,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
        $users = User::where('type', 'farmer')->get(['id', 'name']);
        return view('pages.farmers.create', [
            'model' => new Farmer,
            'users' => $users

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Farmer;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Farmer saved successfully');
            return redirect()->route('farmers.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Farmer');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Farmer $farmer)
    {

        $users = farmer::with('user')->find($farmer->id)->get();
        return view('pages.farmers.edit', [
            'model' => $farmer,
            'users' => $users
            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Farmer $farmer)
    {
        $farmer->fill($request->all());

        if ($farmer->save()) {
            
            session()->flash('app_message', 'Farmer successfully updated');
            return redirect()->route('farmers.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Farmer');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Farmer  $farmer
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Farmer $farmer)
    {
        if ($farmer->delete()) {
                session()->flash('app_message', 'Farmer successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Farmer');
            }

        return redirect()->back();
    }
}
