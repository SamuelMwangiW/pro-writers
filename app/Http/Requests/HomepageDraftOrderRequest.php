<?php

namespace App\Http\Requests;

use App\Support\Utils\OrderDeadline;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class HomepageDraftOrderRequest extends FormRequest
{
    #[ArrayShape(["paper_type_id" => "array", "academic_level_id" => "array", "deadline" => "array", "spaces" => "array", "pages" => "string[]"])]
    public function rules(): array
    {
        $deadline_values = collect(OrderDeadline::all())->keys();

        return [
            "paper_type_id" => ['sometimes', Rule::exists('paper_types', 'id')],
            "academic_level_id" => ['sometimes', Rule::exists('academic_levels', 'id')],
            "deadline" => [Rule::in($deadline_values)],
            "spaces" => ['sometimes', Rule::in([1, 2])],
            "pages" => ['sometimes', 'int', 'min:1'],
        ];
    }
}
