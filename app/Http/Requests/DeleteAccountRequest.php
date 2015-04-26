<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DeleteAccountRequest extends Request {

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
			'delete' => 'required|in:DELETE'
		];
	}
	public function messages()
	{
		return [
      'delete.in' => 'You must correctly type DELETE to proceed.',
		];
	}

}
