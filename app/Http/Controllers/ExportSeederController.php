<?php

namespace App\Http\Controllers;

use App\Models\Criatura;
use App\Models\Equipamento;
use App\Models\Player;
use App\Models\Cenarios;
use App\Models\Habilidades;
use App\Models\Magias;
use Illuminate\Support\Facades\File;

class ExportSeederController extends Controller
{
    public function exportar()
    {
        $criaturas = Criatura::all()->toArray();
        $equipamentos = Equipamento::all()->toArray();
        $players = Player::all()->toArray();
        $cenarios = Cenarios::all()->toArray();
        $habilidades = Habilidades::all()->toArray();
        $magias = Magias::all()->toArray();

        $criaturasData = var_export($criaturas, true);
        $equipamentosData = var_export($equipamentos, true);
        $playersData = var_export($players, true);
        $cenariosData = var_export($cenarios, true);
        $habilidadesData = var_export($habilidades, true);
        $magiasData = var_export($magias, true);

        $seederContent = <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criatura;
use App\Models\Equipamento;
use App\Models\Player;
use App\Models\Cenarios;
use App\Models\Habilidades;
use App\Models\Magias;

class GuiaRPGSeeder extends Seeder
{
    public function run()
    {
        \$criaturas = {$criaturasData};
        foreach (\$criaturas as \$item) {
            Criatura::create(\$item);
        }

        \$equipamentos = {$equipamentosData};
        foreach (\$equipamentos as \$item) {
            Equipamento::create(\$item);
        }

        \$players = {$playersData};
        foreach (\$players as \$item) {
            Player::create(\$item);
        }

        \$cenarios = {$cenariosData};
        foreach (\$cenarios as \$item) {
            Cenarios::create(\$item);
        }

        \$habilidades = {$habilidadesData};
        foreach (\$habilidades as \$item) {
            Habilidades::create(\$item);
        }

        \$magias = {$magiasData};
        foreach (\$magias as \$item) {
            Magias::create(\$item);
        }
    }
}
PHP;

        File::put(database_path('seeders/GuiaRPGSeeder.php'), $seederContent);

        return redirect()->back()->with('success', 'Seeder único gerado com sucesso em database/seeders/GuiaRPGSeeder.php!');
    }
}
