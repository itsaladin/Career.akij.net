<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Contact;

class Employer extends Model
{
    public $fillable = [
        'name',
        'email',
        'division_id'
    ];

    /**
     * hasType
     *
     * @param integer $employer_id
     * @param integer $type_id
     * @return boolean
     */
    public function hasType($employer_id, $type_id)
    {
        $employer_type = EmployerType::where('employer_id', $employer_id)->where('type_id', $type_id)->first();
        if (!is_null($employer_type)){
            return true;
        }
        return false;
    }

    /**
     * primaryContact
     *
     * @param integer $employer_id
     * @return object
     */
    public function primaryContact($employer_id)
    {
        $primary_contact = Contact::where('employer_id', $employer_id)->where('is_primary_contact', 1)->first();
        return $primary_contact;
    }
}
