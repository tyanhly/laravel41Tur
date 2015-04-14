<?php
class UserController extends BaseController {

	public function getList1()
	{
// 		$allUsers = DB::table('users')->paginate(15);
		$allUsers = \User::paginate(15);
// 		var_dump($allUsers);die;
		return View::make("list", array("users" => $allUsers));
	}
	public function getList()
	{
		$page = Input::get('page', 1);
		$perPage = 20;
		$data = $this->getByPage($page, $perPage);
	
		$users = Paginator::make($data->items, $data->totalItems, $perPage);
	
		return View::make('list', array('users' => $users));
	}
	
	public function getByPage($page = 1, $perPage = 10)
	{
		$results = new \StdClass;
		$results->page = $page;
		$results->perPage = $perPage;
		$results->totalItems = 0;
		$results->items = array();
		
		$amountTmp = DB::select('select count(*) as amount from users');
		$results->totalItems = $amountTmp[0]->amount;
		$results->items = DB::select('select * from users limit ?,?', array($perPage*($page-1), $perPage));
		return $results;
	}
}
