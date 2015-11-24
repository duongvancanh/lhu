<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DanhgiaRequest extends Request {

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
            'slcongty' => 'required',
            'txtdanhgia'=> 'required'
			//
		];
	}
    public function messages()
    {
        return[
            'slcongty.required' => 'Vui Lòng Chọn Công Ty',
            'txtdanhgia.required' => 'Vui Lòng Nhập Nội Dung',


        ];
    }
}
