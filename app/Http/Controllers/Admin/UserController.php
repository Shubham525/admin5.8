<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\plugin\user\Repositories\UserRepository;
class UserController extends Controller
{
	protected $repo;
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }
    public function index(Request $request){
		if ($request->ajax()) {
			return $this->repo->userDataTable();
		}
        return view('admin.user.index');
    }
}
