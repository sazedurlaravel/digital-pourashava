<?php

namespace App\Http\Requests;

use App\Rules\ValidMobile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PourashavaInformationRequest extends FormRequest {
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
            'logo'        => ['nullable', Rule::requiredIf( $this->isMethod( 'post' ) ),'image','mimes:png,jpg,jpeg','max:5000'],
            'name'                   => 'required|string',
            'facebook_url'                   => 'required|string',
            'youtube_url'                   => 'required|string',
        ];
    }
}
