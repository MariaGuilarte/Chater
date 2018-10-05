<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessage extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      return [
        'body' => 'required|max:500',
        'sender' => 'required',
        'receiver' => 'required'
      ];
    }
}
