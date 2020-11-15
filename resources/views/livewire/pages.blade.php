<div class="p-6">
 
 
    <x-jet-button wire:click="createShowModal">
        {{ __('Create') }}
    </x-jet-button>

 


<x-jet-dialog-modal wire:model="modalFormVisible">
    <x-slot name="title">
        {{ __('Create Page') }}
    </x-slot>

    <x-slot name="content">
 
        <div class="mt-4">

        <x-jet-label for="title" value="{{ __('Title')}}"/> 
        <x-jet-input id='title' class='block mt-1 w-full' type='text' wire:model.debounce.800ms='title'/>  
        @error('title') <span class="error">{{ $message }}</span>@enderror
            
 
        </div>

        <div class="mt-4">

        <x-jet-label for="slug" value="{{ __('Slug')}}"/> 
        <x-jet-input id='slug' class='block mt-1 w-full' type='text' wire:model.debounce.800ms='slug'/>  
        @error('slug') <span class="error">{{ $message }}</span>@enderror
        </div>

         <div class="mt-4">

            <x-jet-label for="slug" value="{{ __('Content')}}"/> 
   
<div class="rounded-md shadow-sm">

    <div class="mt-1 bg-white">
        <div class="body-content" wire:ignore >
<trix-editor class="trix-content" x-ref='trix' wire:model.debounce.100000ms='content' wire:key="trix-content-unique-key"></trix-editor>

        </div>
    </div>
</div>
@error('content') <span class="error">{{ $message }}</span>@enderror

            </div>

    </x-slot>

    <x-slot name="footer">
 

        <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
            {{ __('Create') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>

</div>