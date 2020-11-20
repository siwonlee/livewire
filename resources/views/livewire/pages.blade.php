<div class="p-6">
 
 
    <x-jet-button wire:click="createShowModal">
        {{ __('Create') }}
    </x-jet-button>

{{-- data dislay --}}
 
<table class="mt-4 min-w-full  divide-y divide-gray-200">
<thead>
<tr>
    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wide">Title</th>
    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wide">Slug</th>
    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wide">Content</th>
    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wide"> </th>
</tr>

</thead>
<tbody class="bg-white divide-y divide-gray-200">



@if ($data->count())
    @foreach ($data as $item )
            <tr>
            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->title}}</td>
         <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->slug}}</td>
            <td class="px-6 py-4 text-sm whitespace-no-wrap">{!! $item->content !!}</td>
            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                
                <x-jet-button wire:click="updateShowModal({{$item->id}})">
                    {{ __('Update') }}
                </x-jet-button>
                
                <x-jet-button wire:click="deleteShowModal({{$item->id}})">
                    {{ __('Delete') }}
                </x-jet-button>
            
            
            
            
            
            </td>           
</tr>
    @endforeach
@else

<tr><td clspan=3></td>No Results      Found</tr>
@endif



</tbody>
</table>


<div class="p-5">


    {{ $data->links() }}
</div>
 
{{-- modal form --}}

<x-jet-dialog-modal wire:model="modalFormVisible">
    <x-slot name="title">
        {{ __('Update Page') }}{{$modelId}}
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
 
@if($modelId)
        <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
            {{ __('Update') }}
        </x-jet-button>
@else
        <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
            {{ __('Create') }}
        </x-jet-button>

@endif
    </x-slot>
</x-jet-dialog-modal>

</div>