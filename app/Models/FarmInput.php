<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property int $quantity quantity
@property varchar $unit unit
@property varchar $status status
@property \Illuminate\Database\Eloquent\Collection $distribution hasMany
   
 */
class FarmInput extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'farm_inputs';

    /**
    * Mass assignable columns
    */
    protected $fillable=['status',
'name',
'quantity',
'unit',
'status'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * distributions
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function distributions()
    {
        return $this->hasMany(Distribution::class,'farm_input_id');
    }



}