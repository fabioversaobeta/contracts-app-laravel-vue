<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Converte o json em array
     */
    protected function prepareForValidation()
    {
        $this->merge(
            [
                'property' => $this->property
            ]
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'property'            => 'required',
            'property.street'     => 'required',
            'property.number'     => 'required',
            'property.district'   => 'required',
            'property.city'       => 'required',
            'property.state'      => 'required'
        ];
    }

    public function messages()
    {
        return [
            'property.required'          => 'Item obrigatório',
            'property.street.required'   => 'Rua obrigatória',
            'property.number.required'   => 'Número obrigatório',
            'property.district.required' => 'Bairro obrigatório',
            'property.city.required'     => 'Cidade obrigatório',
            'property.state.required'    => 'Estado obrigatório'
        ];
    }
}
