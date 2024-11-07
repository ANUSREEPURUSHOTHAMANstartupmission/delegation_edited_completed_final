<?php

namespace App\Http\Livewire\Admin\Upcomingeventdata;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UpcomingEventsImport;
use Livewire\WithFileUploads; // Import the WithFileUploads trait

class ExcelUploadComponent extends Component
{
    use WithFileUploads; // Add the WithFileUploads trait

    public $file;
    public $message;

    public function render()
    {
        return view('livewire.excel-upload');
    }

    public function importEvents()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $this->file->store('excel-imports');

        Excel::import(new UpcomingEventsImport, storage_path('app/' . $file));

        $this->message = 'Upcoming events imported successfully.';
    }
}