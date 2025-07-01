<?php

namespace App\Http\Controllers;

use App\Models\Criatura;
use App\Models\Equipamento;
use App\Models\Player; // corrigido para Player
use Illuminate\Support\Facades\File;

class ExportSeederController extends Controller
{
    public function exportar()
    {
        $criaturas = Criatura::all()->toArray();
        $equipamentos = Equipamento::all()->toArray();
        $players = Player::all()->toArray();

        $criaturasData = var_export($criaturas, true);
        $equipamentosData = var_export($equipamentos, true);
        $playersData = var_export($players, true);

        $seederContent = <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criatura;
use App\Models\Equipamento;
use App\Models\Player;

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
    }
}
PHP;

        File::put(database_path('seeders/GuiaRPGSeeder.php'), $seederContent);

        return redirect()->back()->with('success', 'Seeder único gerado com sucesso em database/seeders/GuiaRPGSeeder.php!');
    }
}
