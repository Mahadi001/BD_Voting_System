<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\BirthCertificate;

class CheckBidForRegister implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $certificate = BirthCertificate::where('bid',$value)->first();
        $dateDiff = date_diff(  date_create($certificate->dateOfBirth), date_create(date('Y-m-d'))  );
        
        if($certificate){
            if($dateDiff->format("%y") >= 18){
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Birth day Certificate invalid or user age under 18';
    }
}
