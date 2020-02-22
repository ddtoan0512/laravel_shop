<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestCategory;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::category.index');
    }

    public function create(){
        return view('admin::category.create');
    }

    public function store(RequestCategory $requestCategory){
        dd($requestCategory->all());
    }

}
