<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $dist_id dist id
@property int $farm_input_id farm input id
@property int $farmer_id farmer id
@property bigint unsigned $user_id user id
@property datetime $dist_date dist date
@property User $user belongsTo
@property Farmer $farmer belongsTo
@property FarmInput $farmInput belongsTo
   
 */
class Distribution extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'distributions';

    /**
    * Mass assignable columns
    */
    protected $fillable=['dist_date',
        'dist_id',
        'farm_input_id',
        'farmer_id',
        'user_id',
        'dist_date',
        'quantity'
];

    /**
    * Date time columns.
    */
    protected $dates=['dist_date'];

    /**
    * user
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
    * farmer
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function farmer()
    {
        return $this->belongsTo(Farmer::class,'farmer_id');
    }

    /**
    * farmInput
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function farmInput()
    {
        return $this->belongsTo(FarmInput::class,'farm_input_id');
    }




}