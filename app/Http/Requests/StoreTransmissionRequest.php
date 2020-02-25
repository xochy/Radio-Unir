<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransmissionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50|min:5',
            'theme' => 'required|max:100|min:10',
            'url' => 'required|max:100|min:5',
            'date' => 'required|max:10|min:6',
            'hour' => 'required|max:10|min:5',
            'listaEstaciones' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'theme.required' => 'El campo tema es obligatorio',
            'theme.min' => 'tema debe contener al menos 10 caracteres',
            'theme.max' => 'tema no debe ser mayor que 100 caracteres',
            'url.required' => 'El campo punto de montaje es obligatorio',
            'url.min' => 'punto de montaje debe contener al menos 5 caracteres',
            'url.max' => 'punto de montaje no debe ser mayor que 100 caracteres',
            'listaEstaciones.required' => 'Debe seleccionar una estación de radio (si no existen estaciones de radio, reportar con el administrador)'
        ];
    }
}