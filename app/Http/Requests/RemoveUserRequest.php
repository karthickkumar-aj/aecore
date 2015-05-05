<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RemoveUserRequest extends Request {

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
			'usercode' => 'required',
			'remove' => 'required|in:REMOVE'
		];
	}
	public function messages()
	{
		return [
      'remove.in' => 'You must correctly type REMOVE to proceed.',
		];
	}

}
