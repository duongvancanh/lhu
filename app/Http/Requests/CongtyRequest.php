<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CongtyRequest extends Request {

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
            'txttencongty' => 'required',
            'txtdiachicongty'=> 'required',
            'txtsdtcongty' => 'required',
            'txtemailcongty'=> 'required|email',
            'tarathongtin'=> 'required',
		];
	}
    public function messages()
    {
        return[
            'txttencongty.required' => 'Vui Lòng Nhập Tên Công Ty',
            'txtdiachicongty.required' => 'Vui Lòng Nhập Địa Chỉ Công Ty',
            'txtsdtcongty.required'=> 'Vui Lòng Nhập SĐT Công Ty',
            'txtemailcongty.required'=> 'Vui Lòng Nhập Email Công Ty',
            'txtemailcongty.email'=> 'Vui Lòng Nhập Đúng Định Dạng Email',
            'tarathongtin.required'=> 'Vui Lòng Nhập Thông Tin Công Ty'
        ];
    }

}
