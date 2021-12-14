<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $arr = [
            'name' => 'required',
            'number_phone' => 'required',
        ];
        if ($this -> id != ''){
        $arr['email'] = ['required', 'email',
            Rule::unique('users')->where(function($query){
                return $query->where('id', '!=', $this->id);
                }),
             ];
        } else {
             $arr['email'] = ['required', 'email',
                Rule::unique('users')->ignore($this->user)];
            }
        return $arr;
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tài khoản',
            'email.required' => 'Vui lòng nhập địa chỉ email',
            'email.email' => 'Địa chỉ email không đúng',
            'email.unique' => 'Địa chỉ email đã tồn tại',
            'number_phone.required' => 'Vui lòng nhập số điện thoại',
        ];
    }
}
