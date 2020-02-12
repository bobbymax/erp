<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'location_during_training' => 'required|string|max:255',
            'training_type' => 'required|string|max:255',
            'certificate' => 'image|mimetypes:image/jpeg,image/jpg,image/png|max:1024',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'A training title is required',
            'provider.required'  => 'The name of the provider is needed.',
            'location_during_training.required' => 'You must provide the training sponsor.',
            'training_type.required' => 'Please tell us what type of training this is.',
            'certificate.max' => 'Please make sure your image is not more than 1MB',
        ];
    }
}
