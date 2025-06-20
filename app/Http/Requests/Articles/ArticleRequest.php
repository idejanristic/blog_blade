<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $segment = request()->segment(2);

        $unique_title = is_null($segment) ? 'unique:articles' : 'unique:articles,title,' . $segment;

        return [
            'title' => 'required|min:3|max:255|' . $unique_title,
            'excerpt' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date|date_format:Y-m-d'
        ];
    }
}
