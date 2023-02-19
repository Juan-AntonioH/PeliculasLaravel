<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titulo' => 'required',
            'anyo' => 'required|numeric|min:1890|max:2023',
            'duracion' => 'required|numeric|min:60|max:220',
            'director_id' => 'required|exists:directors,id'
            // 'titulo' => 'required|min:3',
            // 'anyo' => 'required|numeric|min:4',
            // 'duracion' => 'required|numeric|min:0',
            // 'director_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El título es obligatorio',
            'anyo' => 'Pon bien la editorial',
            'duracion' => 'Solo números',
            'director_id' => 'Solo números'
        ];
    }
}
