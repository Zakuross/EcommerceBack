<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CommentRequest extends FormRequest
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
        return [
            'user_id'=>['required'],
            'product_id'=>['required'],
            'comment'=>['required'],
        ];
    }

    public function messages() {
        return [
            'user_id.required' => 'Un user_id est obligatoire',
            'user_id.uuid' => 'Un user_id doit être un UUID valide',
            'product_id.required'=> 'Un product_id  est obligatoire',
            'product_id.uuid'=> 'Un product_id  doit être un UUID valide',
            'comment.required'=> 'Un commentaire  est obligatoire'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            'success' => false,
            'message' => 'Validation Error',
            'data' => $validator->errors(),
        ];

        throw new HttpResponseException(response()->json($response, 422));
    }

}
