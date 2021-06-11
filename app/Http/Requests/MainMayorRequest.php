<?php

namespace App\Http\Requests;

use App\Rules\ValidMobile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MainMayorRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'image'        => ['nullable', Rule::requiredIf( $this->isMethod( 'post' ) ),'image','mimes:png,jpg,jpeg','max:5000'],
            'name'                   => 'required|string',
            'title'                   => 'required|string',
            'pourashava_name'                   => 'required|string',
            'address'                   => 'required|string',
            'welcome_message'                   => 'required|string',
        ];
    }
}
