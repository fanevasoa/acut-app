<div class="w-full ">

    @for($cs=0; $cs < $maxChronoSong; $cs++)
    <div class="grid grid-cols-7">
        <x-select xs placeholder="Ordre" :options="$chronoOptions" wire:model="fields.{{$cs}}.order" wire:selected="changeSongsOrder({{$cs}})" :id="rand(1,999999)"/>
        <div class="col-span-5">
            <div class="min-w-full">
                <x-dropdown width="w-full" align="left">
                    <x-slot name="trigger">
                        <x-input wire:model="fields.{{$cs}}.song" class="!min-w-full"
                                 placeholder="Intitulé de la chanson" :id="rand(1,999999)"/>
                    </x-slot>
                    <x-dropdown.item label="Help Center"/>
                    <x-dropdown.item separator label="Live Chat"/>
                    <x-dropdown.item separator label="Logout"/>
                </x-dropdown>
            </div>
        </div>
        <div class="flex">
            <x-input wire:model.live="fields.{{$cs}}.pages_number" placeholder="Page" type="number" :id="rand(1,999999)" min="1"/>
            <x-button.circle pink icon="x" wire:click.prevent="$dispatchSelf('remove-song',{ idSong: {{$cs}}})"
                             :id="rand(1,999999)"/>
        </div>
    </div>
    @endfor
    <x-button.circle class="mt-2" xs positive icon="plus"
                     wire:click.prevent="handleAddSong" :id="rand(1,999999)"/>
</div>
