<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductIndexRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['nullable', 'string', 'max:100'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['integer', 'exists:categories,id'],
            'brands' => ['nullable', 'array'],
            'brands.*' => ['integer', 'exists:brands,id'],
            'page' => ['nullable', 'integer', 'min:1'],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'O nome do produto deve ser um texto.',
            'name.max' => 'O nome do produto não pode ter mais que 100 caracteres.',
            'categories.array' => 'As categorias devem ser enviadas em formato de lista.',
            'categories.*.integer' => 'Cada categoria deve ser um número inteiro.',
            'categories.*.exists' => 'Uma ou mais categorias selecionadas são inválidas.',
            'brands.array' => 'As marcas devem ser enviadas em formato de lista.',
            'brands.*.integer' => 'Cada marca deve ser um número inteiro.',
            'brands.*.exists' => 'Uma ou mais marcas selecionadas são inválidas.',
            'page.integer' => 'O número da página deve ser um número inteiro.',
            'page.min' => 'O número da página deve ser pelo menos 1.',
            'per_page.integer' => 'O número de itens por página deve ser um número inteiro.',
            'per_page.min' => 'O número de itens por página deve ser pelo menos 1.',
            'per_page.max' => 'O número de itens por página não pode ser maior que 100.',
        ];
    }
}
