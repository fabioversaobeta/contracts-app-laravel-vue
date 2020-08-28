<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteContractorRequest extends FormRequest
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
                'id' => json_decode($this->id, true)
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
            'id'   => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'id.required'          => 'ID obrigatório',
            'id.document.numeric'  => 'ID deve ser numérico'
        ];
    }
}
