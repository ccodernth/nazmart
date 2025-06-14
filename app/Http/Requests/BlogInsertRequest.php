<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogInsertRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required',
           // 'blog_content' => 'required',
           // 'excerpt' => 'required|max:200',
           // 'title' => 'required|string',
           // 'status' => 'nullable',
           // 'slug' => 'nullable',
           // 'image' => 'nullable|string|max:191',
        ];
    }
}
