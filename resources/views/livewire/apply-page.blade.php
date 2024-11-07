<x-modal formAction="saveAndStay" >
  
    {{ $this->form }}

    <x-slot name="buttons">
        <div class="flex justify-end w-full">
            <div class="flex justify-end space-x-2 ">
               
                <button type="submit" class="px-8 py-2 text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    {{$this->saveTitle}}
                </button>
            </div>
        </div>
    </x-slot>
</x-modal>
