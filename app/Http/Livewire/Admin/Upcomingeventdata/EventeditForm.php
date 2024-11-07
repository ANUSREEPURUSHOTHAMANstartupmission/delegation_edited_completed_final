<?php

namespace App\Http\Livewire\Admin\Upcomingeventdata;

use App\Http\Livewire\ModalForm;
use App\Models\UpcomingEvent;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Spatie\Permission\Models\Role;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DatePicker;



class EventeditForm extends ModalForm {

  public $title = "Events";
    
  public $model_type = UpcomingEvent::class;
  public $permission = "admin:events:";

  public function mount(?UpcomingEvent $model){
   
    $this->model = $model;
    $this->mount_form();
   
  }

  protected function getFormSchema(): array 
  {
      return [
        TextInput::make('name')->required(),
          Grid::make()
              ->schema([
                  
                  DatePicker::make('start_date')->label('Event Start Date')->required(),
                  DatePicker::make('end_date')->label('Event End Date')->required(),

              ]),

      ];
  }

  public static function modalMaxWidth(): string
    {
        return '4xl';
    }
    
 
}