<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SukienRequest extends Request {

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
            'txtnoidung' => 'required',
        ];
	}
    public function messages()
    {
        return[
            'txtnoidung.required' => 'Vui Lòng Nhập Nội Dung',
        ];
    }
}
