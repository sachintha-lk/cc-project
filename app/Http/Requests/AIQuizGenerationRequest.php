<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AIQuizGenerationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'prompt' => 'required|string|min:5|max:100',
            'name' => 'required|string|min:5|max:255',
            'description' => 'nullable|string|min:5|max:255',
            'module_id' => 'required|integer|exists:modules,id',
            'num_questions' => 'required|integer|min:1|max:10',
            'total_marks' => 'nullable|integer|min:0',
            'pass_marks' => 'nullable|integer|min:0|max:total_marks',
            'max_attempts' => 'nullable|integer|min:0',
            'is_published' => 'boolean',
            'media_url' => 'nullable|string',
            'media_type' => 'nullable|string',


        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
