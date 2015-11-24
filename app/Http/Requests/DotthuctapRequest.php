<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DotthuctapRequest extends Request {

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
			'txttendotthuctap' => 'required',
            'txtngaybatdau' => 'required',
            'txtngayketthuc' => 'required'
		];
	}
    public function messages()
    {
        return[
            'txttendotthuctap.required' => 'Vui Lòng Nhập Tên Đợt Thực Tập',
            'txtngaybatdau.required' => 'Vui Lòng Nhập Ngày Bắt Đầu',
            'txtngayketthuc.required'=> 'Vui Lòng Nhập Ngày Kết Thúc'

        ];
    }

}
