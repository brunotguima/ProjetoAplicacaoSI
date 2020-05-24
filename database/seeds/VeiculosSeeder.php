<?php

use Illuminate\Database\Seeder;
use App\Veiculo;

class VeiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("public/js/veiculos.json");
        $data = json_decode($json);

        foreach ($data as $item)
        {
            if($item->ano == 1972) {
                Veiculo::create([
                    'id' => 19614,
                    'tipo' => $item->tipo,
                    'marca' => $item->marca,
                    'modelo' =>$item->modelo,
                    'ano' => $item->ano,
                    'cor' => $item->cor,
                    'placa' => $item->placa,
                    'tanque' => $item->tanque,
                    'renavam' => $item->renavam,
                    'kmcadastro' => $item->kmcadastro,
                    'kmatual' => $item->kmatual,
                ]);
            }else{
                Veiculo::create([
                    'tipo' => $item->tipo,
                    'marca' => $item->marca,
                    'modelo' =>$item->modelo,
                    'ano' => $item->ano,
                    'cor' => $item->cor,
                    'placa' => $item->placa,
                    'tanque' => $item->tanque,
                    'renavam' => $item->renavam,
                    'kmcadastro' => $item->kmcadastro,
                    'kmatual' => $item->kmatual,
                ]);
            }
        }    
    }
}
