<?php

namespace App\Http\Livewire\Admin\Events;

use App\Http\Livewire\ModalForm;
use App\Models\Application;
use App\Models\Attendeedetails;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Radio;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\Str;

class AttendeedetailsCollection extends ModalForm {

    public $title = "Attendee Details";
    public $model_type = Application::class;
    public $permission = "user:applications:";
    public $application;
    public $maxAttendees;

    public function mount(Application $model)
    {
        $this->model = $model;

        $this->maxAttendees = $this->model->event->attendees ?? 1; 

        $this->mount_form();
    }

    protected function getFormSchema(): array 
    {
        return [
            Repeater::make('attendeedetails')->relationship()
            ->schema([
                TextInput::make('name')->label('Name (As per Passport)')->required(),
                TextInput::make('passportnum')->label('Passport Number')->required(),
                FileUpload::make('passportcopy')->directory('uploads')->label('Passport Copy (Front & Back) pdf'),
                TextInput::make('mobilenum')->required()->label('Mobile Number'),
                TextInput::make('email')->required(),
                Radio::make('valid_visa')
                    ->label('Do you currently hold a valid visa for travel to the country where the event is being held?')
                    ->boolean()
                    ->required(),
            ])
            ->columns(2)
            ->maxItems($this->maxAttendees)->minItems(1),  // Use the max attendees from the event
           
            FileUpload::make('companylogo')->directory('uploads')->label('Company Logo (HD)')->required(),
            Textarea::make('companydetails')->label('Company Details')->helperText('Maximun 50 Words')->required()->rows(2),
            Textarea::make('productdetails')->label('Product Details')->helperText('Maximun 50 Words')->required()->rows(2),
        ];
    }

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }

    public function afterCreate($data)
    {
        Notification::make() 
            ->title('Attendee Details added successfully')
            ->success()
            ->send();
    }
}
