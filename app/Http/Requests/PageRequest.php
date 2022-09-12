<?php

namespace App\Http\Requests;

use App\Support\Enums\PageSection;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|unique:pages,title',
            'content' => 'required|string',
            'section' => [new Enum(PageSection::class)],
            'order' => 'nullable|integer'
        ];

        if ($page = $this->route('page')) {
            $rules['title'] .= ',' . $page->id;
        }

        return $rules;
    }
}
