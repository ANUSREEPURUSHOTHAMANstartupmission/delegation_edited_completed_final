<?php

namespace App\Http\Livewire\Admin\Upcomingeventdata;

use App\Http\Livewire\BasePage;

use App\Models\UpcomingEvent;

use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ActionGroup;

class Viewevents extends BasePage
{
  public $title = "Upcoming Events";
  public $permission = "admin:events:";

  protected function deleteItem(UpcomingEvent $record){
    $record->delete();
  }

  protected function editItem(UpcomingEvent $record){
    $this->emit('openModal', 'admin.upcomingeventdata.eventedit-form', [ 'model' => $record->hid ]);
  }

  protected function getTableColumns(): array
  {
    return [
        
        TextColumn::make('name')->searchable()->sortable()->label('Event Name'),

        TextColumn::make('start_date')->searchable()->sortable()->label('Start data'),

        TextColumn::make('end_date')->searchable()->sortable()->label('End data'),


    ];
  }

  protected function getTableQuery(): Builder
  {
      return UpcomingEvent::query()->latest();   
  }

  protected function getTableActions(): array
  {
      return [
              Action::make('Edit')
                ->action(function($record){
                    $this->editItem($record);
                })
                ->visible(function($record){
                    return auth()->user()->can($this->permission.'view');
                })->icon('heroicon-s-pencil')->color('primary'),  

              Action::make('Delete')
                ->action(function($record){
                    $this->deleteItem($record);
                })
                ->visible(function($record){
                    return auth()->user()->can($this->permission.'view');
                })->icon('heroicon-s-trash')->color('primary'),           
      ];
  }

}