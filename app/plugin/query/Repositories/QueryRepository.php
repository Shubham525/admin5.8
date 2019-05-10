<?php 
namespace App\plugin\query\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\plugin\query\Query;
use Mail;
use App\plugin\user\Mail\{
    ForgetPassword,
    EmailVerification
};
use DataTables;
use Validator;
use \Carbon\Carbon;

class QueryRepository
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Query $model)
    {
        $this->model = $model;
    }

    public function createQuery($request){
        return $query = $this->model::create($request->only('email','name','subject','message'));
    }

    public function queryDataTable(){
        $data = $this->model->whereStatus(1)->latest()->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                       $btn = "<a href='javascript:void(0)' data-query ='". $row ."' class='view-btn btn btn-primary btn-sm'>View</a>";

                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
    
}