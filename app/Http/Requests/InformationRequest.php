<?php

namespace App\Http\Requests;

use App\Rules\ValidMobile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InformationRequest extends FormRequest {
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
            'banner'        => ['nullable', Rule::requiredIf( $this->isMethod( 'post' ) ),'image','mimes:png,jpg,jpeg','max:5000'],
            'name'                   => 'required|string',
            'service_email'                  => 'required|email.' .($this->isMethod('put') ? $this->digital_center_admin->id: ''),
            'service_phone'                 => ['required', 'string', 'size:11', new ValidMobile(), 'unique:users,mobile,'  .($this->isMethod('put') ? $this->digital_center_admin->id: '')],
        ];
    }
}
