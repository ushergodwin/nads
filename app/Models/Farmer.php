<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $district district
@property varchar $town town
@property varchar $phone_number phone number
@property varchar $email email
@property date $date_of_birth date of birth
@property \Illuminate\Database\Eloquent\Collection $distribution hasMany
   
 */
class Farmer extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'farmers';

    /**
    * Mass assignable columns
    */
    protected $fillable=['date_of_birth',
'district',
'town',
'phone_number',
'email',
'date_of_birth',
'user_id'];

    /**
    * Date time columns.
    */
    protected $dates=['date_of_birth'];

    /**
    * distributions
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function distributions()
    {
        return $this->hasMany(Distribution::class,'farmer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}