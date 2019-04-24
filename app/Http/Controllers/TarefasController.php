<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;
use Validator;
use Illuminate\Validation\Rule;


class TarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarefas = Tarefa::orderBy('id', 'DESC')->get();

        return response()->json($tarefas, 200);

    }

    public function store(Request $request)
    {

       //Simples validação dos campos da requisição
       $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'descricao' => 'required|max:255',
            'status' => [
                 'required',
                 Rule::in([1,2,3,4])
            ]
        ]);

        if ($validator->fails()) {

            return response()->json($validator->errors(), 400, array());
        }

        $tarefa = new Tarefa();
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->status = $request->status;

        $tarefa->save();

        return response()->json($tarefa, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarefa = Tarefa::find($id);

        if(empty($tarefa)){
            return response()->json('Tarefa não encontrada', 404);
        }

        return response()->json($tarefa, 200);

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
       //Simples validação dos campos da requisição
       $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'descricao' => 'required|max:255',
            'status' => [
                 'required',
                 Rule::in([1,2,3,4])
            ]
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400, array());
        }

         $tarefa = Tarefa::find($id);

        if(empty($tarefa)){
            return response()->json('Tarefa não encontrada', 404);
        }

        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->status = $request->status;

        $tarefa->save();

        return response()->json($tarefa, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarefa = Tarefa::find($id);

        if(empty($tarefa)){
            return response()->json('Tarefa não encontrada', 404);
        }

        $tarefa->delete();
        return response()->json('Tarefa deletada com sucesso', 200);

    }
}
