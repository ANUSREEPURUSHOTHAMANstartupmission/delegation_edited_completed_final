// app/Imports/UpcomingEventImport.php
<?php
namespace App\Imports;

use App\Models\UpcomingEvent;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UpcomingEventImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new UpcomingEvent([
            'name' => $row['name'],
            'start_date' => $row['start_date'],
            'end_date' => $row['end_date'],
        ]);
    }
}
