<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaterialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     */
    public function authorize()
    {
        return true; // Adjust this based on your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
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