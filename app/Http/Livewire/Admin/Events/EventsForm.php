<?php

namespace App\Http\Livewire\Admin\Events;

use App\Http\Livewire\ModalForm;
use App\Models\Events;
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



class EventsForm extends ModalForm {

  public $title = "Events";
    
  public $model_type = Events::class;
  public $permission = "admin:events:";

  public function mount(?Events $model){
   
    $this->model = $model;
    $this->mount_form();
   
  }

  protected function getFormSchema(): array 
  {
      return [
        TextInput::make('name')->required(),
          Grid::make()
              ->schema([
                  
                  DatePicker::make('startdate')->label('Event Start Date')->required(),
                  DatePicker::make('enddate')->label('Event End Date')->required(),

                  TextInput::make('fee')->required(),
                  TextInput::make('venue')->required(),
                  DatePicker::make('lastdate')->label('Application close date')->required(),
                  TextInput::make('website')->label('Event Website'),
                  FileUpload::make('poster')->directory('uploads'),
                  TextInput::make('attendees')->numeric()->label('Number of Attendee')->required()->default(1),


              ]),
        
                  
                  RichEditor::make('description')->required()


      ];
  }

  public static function modalMaxWidth(): string
    {
        return '4xl';
    }
    
 
}