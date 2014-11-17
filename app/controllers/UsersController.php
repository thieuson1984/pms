<?php

class UsersController extends BaseController {

	/**
	 * User Repository
	 *
	 * @var User
	 */
	protected $layout = 'layouts.master';
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->all();

		return View::make('users.index', compact('users'))->with('title','Users List')
										->with('pageheader','Users > Index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create')->with('title','Add new user')
										->with('pageheader','Users > Add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, User::$rules);

		if ($validation->passes())
		{
			$this->user->create($input);

			return Redirect::route('users.index')->with('title','Users List')
										->with('pageheader','Users > Index');
		}

		return Redirect::route('users.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.')
			->with('title','Users List')
			->with('pageheader','Users -> Index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->user->findOrFail($id);

		return View::make('users.show', compact('user'))->with('title','User Details')
										->with('pageheader','Users > Details');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);

		if (is_null($user))
		{
			return Redirect::route('users.index')->with('title','Users List')
										->with('pageheader','Users > Index');
		}

		return View::make('users.edit', compact('user'))->with('title','Edit User')
										->with('pageheader','Users > Edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$rules = array(
			'email' => 'required|email',
			'password' => 'required|min:6',
		);
		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			$user = $this->user->find($id);
			$user->update($input);

			return Redirect::route('users.show', $id)->with('title','Users Details')
										->with('pageheader','Users > Details');
		}

		return Redirect::route('users.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.')
			->with('title','Users List')
			->with('pageheader','Users > Index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->user->find($id)->delete();

		return Redirect::route('users.index')->with('title','Users List')
										->with('pageheader','Users > Index');
	}

}
