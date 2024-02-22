<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreUpdateSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'subject' => 'required|min:3|max:255|unique:supports',  //posso fazer assim ou 
            'body' => [                                             //assim
                'required',
                'min:3',
                'max:100000',
            ],
        ];

        if($this->method() === 'PUT'){      //to falando que se o metodo de requisição for PUT a regra sera diferente

            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                //"unique:supports, subject, {$this->id}, id",      posso fazer assim
                Rule::unique('supports')->ignore($this->id),   //aqui to falando que ela é unico na tabela support mas pode ignorar quando o id for o mesmo 
            ];
        }

        return $rules; 
    }
}
