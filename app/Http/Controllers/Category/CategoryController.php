<?php

namespace App\Http\Controllers\Category;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Category::all();
        //return true;
        return response()->json(['data' =>$categorias, 200]);
        //return $this->showAll($categorias);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = $request->all();
        $categoria = Category::create($campos);
        return Category::create($campos);
        return response()->json(['data' =>$categoria, 201]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Category::findOrfail($id);
        return response()->json(['categoria' => $categoria, 200]);
        //return $this->showOne($usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Category::findOrfail($id);
        if($request->has('name')) {
            $categoria->name =$request->name;
          }
          if($request->has('description')) {
            $categoria->description =$request->description;
          }
          $categoria->save();
          return response()->json(['data'=> $categoria],200);
          //return $this->showOne($categoria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Category::find($id);
        $categoria->delete();
        return response()->json(['data' => $categoria], 200);
        //return $this->showOne($user);
    }
}
