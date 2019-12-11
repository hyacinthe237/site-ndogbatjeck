<?php

namespace Modules\Activity\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\FormRequest;

class ActivityRequest extends FormRequest
{

   /**
     * Force response json type when validation fails
     * @var bool
     */

     protected $forceJsonResponse = true;

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
     switch($this->method())
        {
            case 'POST':
            {
               return [
                    'title' => 'required|string|max:255|min:3',
                    'tags' => 'nullable|string|max:255',
                    'image' => 'nullable|string|max:255',
                    'location' => 'nullable|string|max:255',
                    'excerpt' => 'nullable|string|max:255',
                    'description' => 'nullable|text',
                    'published' => [
                        'nullable',
                        Rule::in(['published', 'unpublished']),
                    ],
                    'is_commentable' => 'nullable|boolean',
                    'is_anchor' => 'nullable|boolean',
                    'is_frequent' => 'nullable|boolean',
                    'published_at' => 'nullable|date',
                    'date_activity' => 'nullable|date',
                    'time_activity' => 'nullable|date|date_format:h:i',
                    'last_updated_by' => 'nullable|integer|exists:users,id',
                ];
            } break;
            case 'PUT':
            {
               return [
                    'title' => 'required|string|max:255|min:3',
                    'tags' => 'nullable|string|max:255',
                    'image' => 'nullable|string|max:255',
                    'location' => 'nullable|string|max:255',
                    'excerpt' => 'nullable|string|max:255',
                    'description' => 'nullable|text',
                    'published' => [
                        'nullable',
                        Rule::in(['published', 'unpublished']),
                    ],
                    'is_commentable' => 'nullable|boolean',
                    'is_anchor' => 'nullable|boolean',
                    'is_frequent' => 'nullable|boolean',
                    'published_at' => 'nullable|date',
                    'date_activity' => 'nullable|date',
                    'time_activity' => 'nullable|date|date_format:h:i',
                    'last_updated_by' => 'nullable|integer|exists:users,id',
                ];
            } break;
            case 'GET': break;
            case 'PATCH': {
                return [
                    'title' => 'required|string|max:255|min:3',
                    'tags' => 'nullable|string|max:255',
                    'image' => 'nullable|string|max:255',
                    'location' => 'nullable|string|max:255',
                    'excerpt' => 'nullable|string|max:255',
                    'description' => 'nullable|text',
                    'published' => [
                        'nullable',
                        Rule::in(['published', 'unpublished']),
                    ],
                    'is_commentable' => 'nullable|boolean',
                    'is_anchor' => 'nullable|boolean',
                    'is_frequent' => 'nullable|boolean',
                    'published_at' => 'nullable|date',
                    'date_activity' => 'nullable|date',
                    'time_activity' => 'nullable|date|date_format:h:i',
                    'last_updated_by' => 'nullable|integer|exists:users,id',
                ];
            } break;
            case 'DELETE': break;
            default:
            {
                return [];
            } break;
        }
    }

}
