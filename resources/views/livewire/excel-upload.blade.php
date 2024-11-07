
<div class=" px-4 py-10 mt-10">

    <div>
        @if ($message)
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <form wire:submit.prevent="importEvents" enctype="multipart/form-data">
            <label for="file">Upload Excel File:</label>

            <div class=" flex md:flex-row flex-col gap-8">
                <div class="form-group w-2/3">
                    <input class="block w-full py-2 px-2 text-sm text-white border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none " id="file_input" type="file" id="file" wire:model="file">

                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-1/3">
                    <button type="submit" class=" bg-green-900 px-3 py-2 text-white rounded-md">Import Upcoming Events</button>
                </div>
            </div>
        </form>
    </div>

    <div class=" w-full">
        <livewire:admin.upcomingeventdata.viewevents />

    </div>
</div>
