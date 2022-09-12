<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Models\FarmInput;
use App\Models\Farmer;
use App\Models\User;
use App\Http\Requests\Distributions\Index;
use App\Http\Requests\Distributions\Show;
use App\Http\Requests\Distributions\Create;
use App\Http\Requests\Distributions\Store;
use App\Http\Requests\Distributions\Edit;
use App\Http\Requests\Distributions\Update;
use App\Http\Requests\Distributions\Destroy;
use Illuminate\Support\Facades\Auth;

/**
 * Description of DistributionController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DistributionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        $distributions = Distribution::with(['user', 'farmer', 'farmInput'])->paginate(10);

        if(Auth::user()->type === 'farmer')
        {
            Distribution::with(['user', 'farmer', 'farmInput'])->where('farmer_id', Auth::user()->id)->paginate(10);
        }
        return view('pages.distributions.index', [
            'records' => $distributions,
            'header' => "Farm InputsDistribution"
        ]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Distribution $distribution)
    {
        return view('pages.distributions.show', [
                'record' =>$distribution,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
		$farm_inputs = FarmInput::all(['id', 'name']);
		$farmers = Farmer::with('user')->get();
		$users = User::all(['id', 'name']);

        return view('pages.distributions.create', [
            'model' => new Distribution,
			"farm_inputs" => $farm_inputs,
			"farmers" => $farmers,
			"users" => $users,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Distribution;
        $model->fill($request->all());

        if (!$this->deductInputQuantity($request->post('quantity', 0), $request->post('farm_input_id')))
        {
            session()->flash('app_message', 'Can not distribute: The entered quantity is more than the available one.');
            return redirect()->back();
        }
        if ($model->save()) {
            
            session()->flash('app_message', 'Distribution saved successfully');
            return redirect()->route('distributions.index');
        } else {
                session()->flash('app_message', 'Something is wrong while saving Distribution');
        }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Distribution $distribution)
    {
		$farm_inputs = FarmInput::all(['id']);
		$farmers = Farmer::all(['id']);
		$users = User::all(['id']);

        return view('pages.distributions.edit', [
            'model' => $distribution,
			"farm_inputs" => $farm_inputs,
			"farmers" => $farmers,
			"users" => $users,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Distribution $distribution)
    {
        $distribution->fill($request->all());

        if ($distribution->save()) {
            
            session()->flash('app_message', 'Distribution successfully updated');
            return redirect()->route('distributions.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Distribution');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Distribution  $distribution
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Distribution $distribution)
    {
        if ($distribution->delete()) {
                session()->flash('app_message', 'Distribution successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Distribution');
            }

        return redirect()->back();
    }

    protected function deductInputQuantity($quantity, $input_id)
    {
        $farm_input = FarmInput::find($input_id);

        $new_quantity = $farm_input->quantity > $quantity ?  $farm_input->quantity - $quantity : 0;

        if($new_quantity === 0)
        {
            return false;
        }

        return FarmInput::find($input_id)->update(['quantity' => $new_quantity]) > 0;
    }
}
