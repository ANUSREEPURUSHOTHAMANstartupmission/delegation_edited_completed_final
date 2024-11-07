<?php

namespace App\Http\Livewire\Admin\Events;

use App\Http\Livewire\BasePage;
use App\Models\Application;
use App\Models\Events;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ActionGroup;


class EventsPage extends BasePage
{
  public $title = "Events";
  public $permission = "admin:events:";

  public $actions = [
    [
        "label" => "New Events",
        "perms" => "admin:events:create",
        "icon" => "plus",
        "action" => "createItem",
        "class" => "bg-green-400 text-white"
    ],
  ];

  public function createItem(){
    $this->emit('openModal', 'admin.events.events-form');
  }

  protected function editItem(Events $record){
    $this->emit('openModal', 'admin.events.events-form', [ 'model' => $record->hid ]);
  }

  protected function deleteItem(Events $record){
    $record->delete();
  }


  protected function viewapplications(Events $record){
    return redirect()->route('admin.viewapplication.show',[$record->hid]);
  }



  protected function getTableColumns(): array
  {
    return [
        TextColumn::make('name')->searchable()->sortable()->label('Name'),
        TextColumn::make('venue')->searchable()->sortable(),


    ];
  }

  protected function getTableQuery(): Builder
  {
      return Events::query()->latest();   
  }




  protected function getTableActions(): array
  {
      return [
        Action::make('View Applications')
        ->action(function($record){
            $this->viewapplications($record);
        }),

          ActionGroup::make([
           
            Action::make('edit')
                ->action(function($record){
                    $this->editItem($record);
                })
                ->visible(function($record){
                    return auth()->user()->can($this->permission.'update');
                })->icon('heroicon-s-pencil')->color('primary'),
            Action::make('delete')
                ->action(function($record){
                    $this->deleteItem($record);
                })
                ->visible(function($record){
                    return auth()->user()->can($this->permission.'delete');
                })->icon('heroicon-o-trash')->color('danger')
                ->requiresConfirmation(),
              
            
          ])
          
      ];
  }


}