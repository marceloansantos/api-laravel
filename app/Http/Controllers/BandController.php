<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    // Método para obter todas as bandas
    public function getAll()
    {
        $bands = $this->getBands(); // Chama o método protegido getBands

        return response()->json($bands); // Retorna as bandas em formato JSON
    }

    public function store(Request $request)
    {
        $validate = $request->validade([
            'id' => 'numero',
            'name' => 'required|min:3'
        ]);
    }




    // Método para obter bandas por gênero
    public function getBandsByGender($gender)
    {
        $bands = []; // Corrigido para plural, pois pode haver mais de uma banda

        foreach ($this->getBands() as $_band) // Itera sobre as bandas
        {
            if ($_band['gender'] == $gender) // Verifica se o gênero corresponde
            {
                $bands[] = $_band; // Adiciona a banda encontrada ao array
            }
        }

        return response()->json($bands); // Retorna as bandas em formato JSON
    }

    // Método para obter uma banda específica pelo ID
    public function getBand($id)
    {
        $band = null; // Inicializa a variável $band

        foreach ($this->getBands() as $_band) // Itera sobre as bandas
        {
            if ($_band['id'] == $id) // Verifica se o ID corresponde
            {
                $band = $_band; // Atribui a banda encontrada à variável $band
                break; // Sai do loop após encontrar a banda
            }
        }

        return $band ? response()->json($band) : abort(404); // Retorna a banda em formato JSON ou erro 404
    }

    // Método protegido para retornar um array de bandas
    protected function getBands() 
    {
        return [
            [
                'id' => 1, 'name' => 'dream_theater', 'gender' => 'progressivo'
            ],
            [
                'id' => 2, 'name' => 'metallica', 'gender' => 'rock'
            ],
            [
                'id' => 3, 'name' => 'foo_fighters', 'gender' => 'popular'
            ],
            [
                'id' => 4, 'name' => 'pixies', 'gender' => 'antigo'
            ]
        ];
    }
}
