<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\plugin\query\Repositories\QueryRepository;

class QueryController extends Controller
{
    public function __construct(QueryRepository $repo)
    {
        $this->repo = $repo;
    }
    public function index(Request $request){
		if ($request->ajax()) {
			return $this->repo->queryDataTable();
		}
        return view('admin.query.index');
    }
}
