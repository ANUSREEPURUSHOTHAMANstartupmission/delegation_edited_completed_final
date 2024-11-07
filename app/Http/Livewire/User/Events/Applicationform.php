<?php

namespace App\Http\Livewire\User\Events;

use App\Http\Livewire\ModalForm;
use App\Models\Application;
use App\Models\Events;
use App\Notifications\ApplicationSubmitionNotification;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Radio;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Carbon\Carbon;
use App\Helpers\UidHelper;
use App\Helpers\UidupdateHelper;

class Applicationform extends ModalForm
{
    public $title = "Application";
    public $event;
    public $model_type = Application::class;
    public $permission = "user:applications:";

    public $startup_stage;
    public $business_sector;
    public $revenue_generated_current;
    public $revenue_generated_previous;
    public $investment_raised;
    public $why_participate;
    public $willing_to_pay;

    public $currentFinancialYear;
    public $previousFinancialYear;

    public function mount(Events $event)
    {
        $this->event = $event;

        // Fetch the latest application for the startup
        $application = Application::where('startup_id', auth()->user()->startup->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($application) {
            // Fill component properties with the application data
            $this->startup_stage = $application->startup_stage;
            $this->business_sector = $application->business_sector;
            $this->revenue_generated_current = $application->revenue_generated_current;
            $this->revenue_generated_previous = $application->revenue_generated_previous;
            $this->investment_raised = $application->investment_raised;
            $this->why_participate = $application->why_participate;
            $this->willing_to_pay = $application->willing_to_pay;
        }

        $this->calculateFinancialYears();
        $this->mount_form();
    }

    protected function calculateFinancialYears()
    {
        // Calculate last two completed financial years dynamically
        $currentYear = Carbon::now()->year;
        $lastYear = $currentYear - 1;
        $yearBeforeLast = $currentYear - 2;

        $this->currentFinancialYear = ($lastYear) . '-' . $currentYear;
        $this->previousFinancialYear = ($yearBeforeLast) . '-' . $lastYear;
    }

    protected function getFormSchema(): array
    {
        return [
            Radio::make('startup_stage')
                ->label('Startup Stage')
                ->options([
                    'Beta Launched' => 'Beta Launched',
                    'Early Revenues' => 'Early Revenues',
                    'Steady Revenues' => 'Steady Revenues',
                ])
                ->required()
                ->default($this->startup_stage),

            Select::make('business_sector')
                ->label('Business Sector (B2B/B2C/B2G etc)')
                ->options([
                    'B2B' => 'B2B',
                    'B2C' => 'B2C',
                    'B2G' => 'B2G',
                ])
                ->default($this->business_sector)
                ->required(),

            TextInput::make('revenue_generated_current')
                ->numeric()
                ->required()
                ->label("Revenue Generated for the financial year {$this->currentFinancialYear} ( Rs in lakhs )")
                ->default($this->revenue_generated_current),

            TextInput::make('revenue_generated_previous')
                ->numeric()
                ->required()
                ->label("Revenue Generated for the financial year {$this->previousFinancialYear} ( Rs in lakhs )")
                ->default($this->revenue_generated_previous),

            TextInput::make('investment_raised')
                ->numeric()
                ->label('Investment raised ( Rs in lakhs )')
                ->required()
                ->default($this->investment_raised),

            Textarea::make('why_participate')
                ->label('Why do you want to participate in this delegation?')
                ->rows(2)
                ->cols(20)
                ->required()
                ->default($this->why_participate),

            Radio::make('willing_to_pay')
                ->label('I accept the terms and am willing to pay the registration fee')
                ->boolean()
                ->required()
                ->default($this->willing_to_pay),
        ];
    }

    public function beforeCreate($data)
    {
        $this->model->event_id = $this->event->id;
        $this->model->startup_id = auth()->user()->startup->id;
        $this->model->current_fy = $this->currentFinancialYear;
        $this->model->previous_fy = $this->previousFinancialYear;
    }

    public function afterCreate($data)
    {
        $startup = $this->model->startup;

        $startupdata = UidHelper::getUidDetails($startup->unique_id);
        $directors = $startupdata["directors"];
        $products = $startupdata["products"];

        UidupdateHelper::updateuid($startupdata, $directors,$products,$startup);
    
        $this->model->startup->user->notify(new ApplicationSubmitionNotification($this->model));
        Notification::make()
            ->title('Your Application Submitted')
            ->success()
            ->body('To receive updates about your application, please log in to your account.')
            ->send();

        return redirect()->route('index');
    }

    public function render()
    {
        return view('livewire.apply-page');
    }
}
