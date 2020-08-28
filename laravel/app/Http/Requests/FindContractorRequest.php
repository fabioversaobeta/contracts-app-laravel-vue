<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FindContractorRequest extends FormRequest
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
                'contractor' => json_decode($this->contractor, true)
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
            'contractor'            => 'required',
            'contractor.document'   => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'contractor.required'          => 'Item obrigatório',
            'contractor.document.required' => 'Documento obrigatório',
            'contractor.document.numeric'  => 'Documento deve ser numérico'
        ];
    }
}
