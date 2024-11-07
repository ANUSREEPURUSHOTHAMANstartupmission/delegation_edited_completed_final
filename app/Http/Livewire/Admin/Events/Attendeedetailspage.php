<?php

namespace App\Http\Livewire\Admin\Events;

use App\Models\Application;
use App\Models\Attendeedetails;
use App\Models\Events;
use App\Models\Fund;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Closure;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Database\Eloquent\Model;

class Attendeedetailspage extends Component implements HasTable
{
  use InteractsWithTable;

  public $title = "Applications Details";
  public $permission = "admin:dashboard:";
 
  public $application;
  public $applicationId;

  public function mount($applicationId)
  {
      $this->applicationId = $applicationId;  // Set the applicationId
  }

  protected function getTableColumns(): array
  {
      return [
        TextColumn::make('name')
              ->label('Name'),
        TextColumn::make('passportnum')->label('Passport Num.'),
        ViewColumn::make('passportcopy')->view('livewire.attendee-company'),
        TextColumn::make('mobilenum')->label('Mobile Num.'),
        TextColumn::make('email')->label('Email'),
        TextColumn::make('valid_visa')
        ->label('Valid Visa')
        ->getStateUsing(function ($record) {
            return $record->valid_visa ? 'Yes' : 'No';
        }),
      ];
  }
  

  protected function getTableQuery(): Builder
    {
        return Attendeedetails::query()->where('application_id',$this->applicationId);
    }
 
  public function render()
  {
    return view('livewire.application-page');
  }

}
