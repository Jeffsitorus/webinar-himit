<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        return [
            'category' => 'required',
            'title' => 'required|max:255|min:5|string',
            'content' => 'required',
            'status' => 'required',
            'published_at' => 'required',
            'thumbnail' => 'image|mimes:jpg,png,jpeg|max:2048',
            'tags' => 'array|required',
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'Bidang kategori harus dipilih',
            'title.required' => 'Bidang judul post harus diisi',
            'title.max' => 'Judul maksimal 255 karakter',
            'title.min' => 'Judul minimal 5 karakter',
            'content.required' => 'Bidang deskripsi harus diisi',
            'status.required' => 'Bidang status harus dipilih',
            'published_at.required' => 'Bidang tanggal harus diisi',
            'thumbnail.max' => 'File maksimal 2MB.',
            'thumbnail.image' => 'File hanya berupa gambar,Contoh jpg,png dan jpeg',
            'thumbnail.uploaded' => 'Maksimal file 2MB.',
            'tags.required' => 'Bidang tag harus dipilih'
        ];
    }
}
