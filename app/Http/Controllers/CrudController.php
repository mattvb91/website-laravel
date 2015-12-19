<?php

namespace App\Http\Controllers;

use App\Models\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Route;

/**
 * Class CrudController
 * @package App\Http\Controllers
 *
 * TODO move this off to its own composer package
 */
abstract class CrudController extends Controller
{

    const PAGINATION_PAGE_SIZE = 15;

    private $entity;

    //TODO replace this along with getModelClass to use route binded model instead
    private function getEntity()
    {
        if(!$this->entity)
        {
            $route = Route::getCurrentRoute();
            /* @var $route \Illuminate\Routing\Route */

            $modelParameter = key($route->parameters());
            $model = $this->getModelClass();
            $id = (int) $route->getParameter($modelParameter);
            $this->entity = $model::findOrNew($id);
        }

        return $this->entity;
    }

    abstract function getModelClass();

    /**
     * Get the pagination page size.
     *
     * @return int
     */
    public function getPaginationPageSize()
    {
        return self::PAGINATION_PAGE_SIZE;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = $this->getModelClass();
        $entities = $model::paginate($this->getPaginationPageSize());

        return view(Route::getCurrentRoute()->getName(), compact('entities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $entity = $this->getEntity();

        return view(Route::getCurrentRoute()->getName(), compact('entity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Model $model
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Model $model
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
