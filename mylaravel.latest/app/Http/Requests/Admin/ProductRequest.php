<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $arr= [
            'number' => 'required',
            'price' => 'required',
        ];
        if($this->id!=''){
            $arr['name'] = ['required',
            Rule::unique('products')->where(function($query){
                return $query->where('id', '!=', $this->id);
                }),
             ];
        } else {
            $arr['name'] = ['required', Rule::unique('products')->ignore($this->product)];
            $arr['img'] = 'required';

        }
        return $arr;
    } 

    public function messages()
    {
        $arrMsg = [
        'number.required' => 'Vui lòng nhập số lượng sản phẩm',
        'price.required' => 'Vui lòng nhập giá sản phẩm',
        ];
        if($this->id != ''){
            $arrMsg['name.required'] = 'Vui lòng nhập tên sản phẩm';
            $arrMsg['name.unique'] = 'Tên sản phẩm đã tồn tại';
        } else {
            $arrMsg['name.required'] = 'Vui lòng nhập tên sản phẩm';
            $arrMsg['name.unique'] = 'Tên sản phẩm đã tồn tại';
            $arrMsg['img.required'] = 'Vui lòng tải ảnh sản phẩm';
        }
        return $arrMsg;
    }
}
