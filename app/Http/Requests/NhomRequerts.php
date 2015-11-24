<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class NhomRequerts extends Request {

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
            'txttennhom' => 'required',
            'slgiaovienhd' => 'required',
            'sldotthuctap' => 'required',
        ];
	}
    public function messages(){
        return[
          'txttennhom.required' => 'Vui Lòng Nhập Tên Nhóm',
            'slgiaovienhd.required' =>'Vui Lòng Chọn GVHD',
             'sldotthuctap.required'=>'Vui Lòng Chọn Đợt Thực Tập',

        ];
    }

}
