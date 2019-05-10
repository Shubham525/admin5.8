<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plugin\query\Repositories\QueryRepository;
use App\plugin\query\Requests\{
    CreateQueryRequest
};
class LandingController extends Controller
{
    // model property on class instances
    protected $repo;

    // Constructor to bind model to repo
    public function __construct(QueryRepository $repo)
    {
        $this->repo = $repo;
    }
	/**
    * index page 
    *
    * @return json
    */
    public function index(){
    	return view('landing.index');
    }

	/**
    * services page 
    *
    * @return json
    */
    public function getService(){
    	return view('landing.services');
    }

	/**
    * support page page 
    *
    * @return json
    */
    public function getSupport(){
    	return view('landing.support');
    }

	/**
    * about page 
    *
    * @return json
    */
    public function getAbout(){
        return view('landing.about');
    }

    /**
    * FAQ page 
    *
    * @return json
    */
    public function getFaq(){
        return view('landing.faq');
    }

    /**
    * FAQ page 
    *
    * @return json
    */
    public function getBlog(){
    	return view('landing.blog');
    }

    /**
    * create user query 
    *
    * @return json
    */
    public function postQuery(CreateQueryRequest $request){
        if($this->repo->createQuery($request)){
            $message = "Query submitted successfully";
            $name = "success";
        }else{
            $message = "Something went wrong";
            $name = "error";
        }
    	return redirect('/')->with($name,$message);
    }
}
