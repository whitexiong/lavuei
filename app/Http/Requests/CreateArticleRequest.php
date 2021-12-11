<?php

namespace App\Http\Requests;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateArticleRequest extends FormRequest
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
        $article = Article::new()->getTable();
        return [
            'user_id' => ['required', Rule::exists(User::new()->getTable(),'id')],
            'categories_id' => ['required'],
            'comments' => ['required'],
            'title' => ['required', 'string', 'between:5,60'],
            'subtitle' => ['required', 'string', 'between:5,128'],
            'body' => ['required', 'string'],
            'status' => ['required']
        ];
    }
}
