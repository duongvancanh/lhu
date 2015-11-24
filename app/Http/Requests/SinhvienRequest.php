<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SinhvienRequest extends Request {

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
            'txtmssv' => 'required',
            'txtten'=> 'required',
            'txtdiachi' => 'required',
            'txtsdt'=> 'required',
            'txtemail'=> 'required|email',
            'slgioitinh'=>'required'
        ];
	}
    public function messages()
    {
        return[
            'txtmssv.required' => 'Vui Lòng Nhập Mã Số SV',
            'txtten.required' => 'Vui Lòng Nhập Tên Sinh Viên',
            'txtdiachi.required'=> 'Vui Lòng Nhập Địa Chỉ',
            'txtsdt.required'=> 'Vui Lòng Nhập Số Điện Thoại',
            'txtemail.email'=> 'Vui Lòng Nhập Đúng Định Dạng Email',
            'txtemail.required'=> 'Vui Lòng Nhập Email',
            'slgioitinh.required' =>'Vui Lòng Chọn Giới Tinh'
        ];
    }

}
