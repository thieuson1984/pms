<?php

class UserrolesController extends BaseController {

	/**
	 * Userrole Repository
	 *
	 * @var Userrole
	 */
	protected $userrole;

	public function __construct(Userrole $userrole)
	{
		$this->userrole = $userrole;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userroles = $this->userrole->all();
		$itemsHelper = new ItemsHelper($userroles);
		return View::make('userroles.index', compact('userroles','itemsHelper'))->with('title','Userroles List')
										->with('pageheader','Userroles > Index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('userroles.create')->with('title','Add new userrole')
										->with('pageheader','Userroles > Add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Userrole::$rules);

		if ($validation->passes())
		{
			$this->userrole->create($input);

			return Redirect::route('userroles.index')->with('title','Userroles List')
										->with('pageheader','Userroles > Index');
		}

		return Redirect::route('userroles.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.')->with('title','Add new userrole')
										->with('pageheader','Userroles > Add');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$userrole = $this->userrole->findOrFail($id);

		return View::make('userroles.show', compact('userrole'))->with('title','Userrole Details')
										->with('pageheader','Userroles > Details');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$userrole = $this->userrole->find($id);

		if (is_null($userrole))
		{
			return Redirect::route('userroles.index')->with('title','Userroles List')
										->with('pageheader','Userroles > Index');
		}

		return View::make('userroles.edit', compact('userrole'))->with('title','Edit Userrole')
										->with('pageheader','Userroles > Edit');
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
		$validation = Validator::make($input, Userrole::$rules);

		if ($validation->passes())
		{
			$userrole = $this->userrole->find($id);
			$userrole->update($input);

			return Redirect::route('userroles.show', $id);
		}

		return Redirect::route('userroles.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->userrole->find($id)->delete();

		return Redirect::route('userroles.index');
	}

}
