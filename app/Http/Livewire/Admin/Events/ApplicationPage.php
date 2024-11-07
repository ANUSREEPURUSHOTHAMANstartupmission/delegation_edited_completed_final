<?php

namespace App\Http\Livewire\Admin\Events;

use App\Exports\ApplicationsExport;
use App\Http\Livewire\BasePage;
use App\Models\Application;
use App\Models\User;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ActionGroup;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\ViewColumn;

class ApplicationPage extends BasePage
{
    public $title = "All Applications";
    public $permission = "admin:application:";

    protected function deleteItem(Application $record)
    {
        $record->delete();
    }

    protected function showItem(Application $record)
    {
        return redirect()->route('admin.application.show', [$record->hid]);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('event.name')->searchable()->sortable()->label('Event Name'),
            TextColumn::make('startup.name')->searchable()->sortable()->label('Startup Name'),
            TextColumn::make('status')->searchable()->sortable(),
            ViewColumn::make('remark')
                ->label('')
                ->view('components.user-dot')
                ->getStateUsing(function ($record) {
                    $remarks = json_decode($record->remark, true) ?? [];
                    foreach ($remarks as &$remark) {
                        $user = User::find($remark['user_id']);
                        $remark['email'] = $user ? $user->email : 'unknown@example.com';
                    }
                    return [
                        'remarks' => $remarks,
                        'status' => $record->status,
                    ];
                }),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return Application::query()->latest();
    }

    protected function getTableActions(): array
    {
        return [
            ActionGroup::make([
                Action::make('View Applications')
                    ->action(function ($record) {
                        $this->showItem($record);
                    })
                    ->visible(function ($record) {
                        return auth()->user()->can($this->permission . 'view');
                    })->icon('heroicon-s-eye')->color('primary'),
            ]),
        ];
    }

    protected function getTableFilters(): array
  {
      return [
        SelectFilter::make('status')->name('Application Status')
        ->options([
            'Selected' => 'Selected',
            'Rejected' => 'Rejected',
            'Selected for Next Round' => 'Selected for Next Round',
            'On hold'=>'On hold',
            
        ])
        ->attribute('status'),
        SelectFilter::make('paymentstatus')->name('Payment Status')
        ->options([
            'Payment Completed' => 'Payment Completed',
        ])
        ->attribute('paymentstatus')
      ];
  }

    protected function getTableBulkActions(): array
    {
        return [
            BulkAction::make('export')
                ->label('Export Selected')
                ->action(function ($records) {
                    $applications = Application::whereIn('id', $records->pluck('id'))->get();
                    return Excel::download(new ApplicationsExport($applications), 'Selected_Applications.xlsx');
                })
                ->icon('heroicon-s-download')
                ->color('success'),
        ];
    }
    
}
