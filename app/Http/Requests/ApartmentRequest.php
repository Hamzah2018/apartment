<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'address' => 'required|max:100|unique:apartments,address',
            'price' => 'required|numeric',
            'apartment_descrip' => 'required',
        ];
    }
    public function message(){
        return [
            'adderess.requird' => __('messages.offer name required'),
        ];
        }
}
