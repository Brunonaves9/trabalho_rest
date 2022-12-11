<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TarefasController extends Controller {

    /**
     * Retorna todas as Tarefas cadastradas no sistema
     */
    public function get_tarefas()
    {        
        return response()->json(Tarefa::all(), 200);
    }

    /**
     * Retorna a tarefa pelo seu ID
     * @param $id => ID da Tarefa
     */
    public function get_tarefas_by_id(int $id)
    {
        return response()->json(Tarefa::find($id));
    }

    /**
     * Insere uma nova tarefa
     * @param $request -> Objeto POST
     */
    public function set_tarefa(Request $request)
    {

        $insert = Tarefa::create($request->all());

        return response()->json($insert, 201);

    }

    /**
     * Atualiza uma tarefa
     * @param $request
     * @param $id
     */
    public function update_tarefa($id, Request $request)
    {
        try {

            $update = Tarefa::findOrFail($id);
            $update->update($request->all());

            return response()->json($update, 200);

        } catch (ModelNotFoundException $e) {
            return response('Erro ao editar', 406);
        }

    }

    public function delete_tarefa($id)
    {
        try {

            Tarefa::findOrFail($id)->delete();

            return response('Deletado com Sucesso', 200);

        } catch (ModelNotFoundException $e) {
            return response('Erro ao deletar', 406);
        }

    }

}