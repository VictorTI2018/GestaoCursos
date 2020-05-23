<?php

namespace App\Http\Controllers\Curso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Curso\CursoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{

    /** @var \App\Repository\Curso\CursoRepository */
    protected $cursoRepository;

    public function __construct(CursoRepository $cursoRepository)
    {
        $this->cursoRepository = $cursoRepository;
    }

    public function index(int $user_id): JsonResponse
    {
        $cursos = $this->cursoRepository->all($user_id);
        return response()->json($cursos, 200);
    }

    public function getById(int $id, int $user_id)
    {
        $curso = $this->cursoRepository->find("id", $id, $user_id);
        return response()->json($curso, 200);
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'descricao' => 'required',
            'duracao_curso' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "validator" => true,
                "message" => $validator->errors()
            ], 401);
        }

        $data = $request->all();
        $curso = $this->cursoRepository->insert($data);
        return response()->json($curso, 200);
    }
}
