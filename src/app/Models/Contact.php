<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['last_name', 'first_name', 'gender', 'email', 'tel_area_code', 'tel_local_number', 'tel_sub_number', 'address', 'building', 'details'];

    public static $rules = array(
        'last_name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'gender' => 'required',
        'email' => 'required|email|max:255',
        'tel_area_code' => 'required|numeric|digits_between:1,5',
        'tel_local_number' => 'required|numeric|digits_between:1,5',
        'tel_sub_number' => 'required|numeric|digits_between:1,5',
        'address' => 'required|string|max:255',
        'building' => 'nullable|string|max:255',
        'details' => 'required|string|max:120',
    );
}
