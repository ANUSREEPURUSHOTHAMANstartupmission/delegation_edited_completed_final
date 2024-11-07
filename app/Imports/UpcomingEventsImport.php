<?php


namespace App\Imports;

use App\Models\UpcomingEvent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class UpcomingEventsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Check if 'name', 'start_date', and 'end_date' are set and not null
        if (!isset($row['name']) || !isset($row['start_date']) || !isset($row['end_date'])) {
            // Log or handle the missing data
            return null;
        }

        // Convert Excel date to Carbon instance and then format it to 'Y-m-d'
        $start_date = null;
        $end_date = null;

        try {
            $start_date = Carbon::instance(Date::excelToDateTimeObject($row['start_date']))->format('Y-m-d');
            $end_date = Carbon::instance(Date::excelToDateTimeObject($row['end_date']))->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }

        return new UpcomingEvent([
            'name' => $row['name'],
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);
    }
}
