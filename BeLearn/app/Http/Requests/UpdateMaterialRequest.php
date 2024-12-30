<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaterialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You can add authorization logic if needed.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kelas' => 'required|integer|min:1',
            'mata_pelajaran' => 'required|string|max:255',
            'bab' => 'required|integer|min:1',
            'nama_video' => 'required|string|max:255',
            'video_url' => 'required|url',
        ];
    }
}
