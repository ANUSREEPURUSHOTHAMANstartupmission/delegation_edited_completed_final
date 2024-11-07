<?php

namespace App\Http\Livewire\Admin\Events;

use App\Http\Livewire\BasePage;

use App\Models\Application;

use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ActionGroup;

class RejectedPage extends BasePage
{
  public $title = "Rejected";
  public $permission = "admin:application:";

  protected function deleteItem(Application $record){
    $record->delete();
  }

  
  protected function showItem(Application $record){
    return redirect()->route('admin.application.show',[$record->hid]);
  }



  protected function getTableColumns(): array
  {
    return [
        
        TextColumn::make('event.name')->searchable()->sortable()->label('Event Name'),

        TextColumn::make('startup.name')->searchable()->sortable()->label('Startup Name'),

    ];
  }

  protected function getTableQuery(): Builder
  {
      return Application::query()->where('status',"Rejected")->latest();   
  }

  protected function getTableActions(): array
  {
      return [
          ActionGroup::make([
              Action::make('View Applications')
                  ->action(function($record){
                      $this->showItem($record);
                  })
                  ->visible(function($record){
                      return auth()->user()->can($this->permission.'view');
                  })->icon('heroicon-s-eye')->color('primary'),
            
          ])
      ];
  }

}