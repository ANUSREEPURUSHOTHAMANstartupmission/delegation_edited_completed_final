<?php

namespace App\Http\Livewire\User\Events;

use App\Http\Livewire\BasePage;

use App\Models\Application;
use App\Models\Startup;

use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Closure;
use Illuminate\Database\Eloquent\Model;

class MyapplicationPage extends BasePage
{
  public $title = "Application";
  public $permission = "user:applications:";

  
  protected function showItem(Application $record){
    return redirect()->route('user.application.show',[$record->hid]);
  }



  protected function getTableColumns(): array
  {
    return [
        TextColumn::make('event.name')->searchable()->sortable()->label('Name'),
        TextColumn::make('status')->searchable()->sortable()->label('Status'),

        TextColumn::make('paymentstatus')->searchable()->sortable()->label('Payment Status'),

       
    ];
  }

  protected function getTableQuery(): Builder
  {
      $startup = Startup::where('user_id', auth()->id())->first();

      return Application::where('startup_id',$startup->id)->latest(); ;


  }

  protected function getTableActions(): array
  {
      return [
          ActionGroup::make([
              Action::make('View Application')
                  ->action(function($record){
                      $this->showItem($record);
                  })
                  ->visible(function($record){
                      return auth()->user()->can($this->permission.'view');
                  })->icon('heroicon-s-eye')->color('primary'),
            
          ])
      ];
  }

protected function getTableRecordUrlUsing(): ?Closure
{
    return fn (Model $record): string => route('user.application.show',[$record->hid]);
}
  protected function getTableFilters(): array
  {
      return [
        SelectFilter::make('status')->name('Application Status')
        ->options([
            'Selected' => 'Selected',
            'Rejected' => 'Rejected',
            
        ])
        ->attribute('status')
      ];
  }
   

}