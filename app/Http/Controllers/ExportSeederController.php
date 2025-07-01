<?php

namespace App\Http\Controllers;

use App\Models\Criatura;
use Illuminate\Support\Facades\File;

class ExportSeederController extends Controller
{
    public function exportar()
    {
        $criaturas = Criatura::all()->toArray();

        $data = var_export($criaturas, true);

        $seederContent = <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criatura;

class CriaturaSeeder extends Seeder
{
    public function run()
    {
        \$data = {$data};

        foreach (\$data as \$item) {
            Criatura::create(\$item);
        }
    }
}
PHP;

        File::put(database_path('seeders/CriaturaSeeder.php'), $seederContent);

        return redirect()->back()->with('success', 'Seeder gerado com sucesso em database/seeders/CriaturaSeeder.php!');
    }
}
