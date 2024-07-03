namespace App\Exports;

use App\Models\Vehiculo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VehiculosExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Vehiculo::all();
    }

    public function headings(): array
    {
        return [
            'placa',
            'color',
            'marca',
            'tipo',
            'conductores_id',
            'propietarios_id',
        ];
    }
}
