<div class="w-full">
    <div class="grid grid-cols-6">
        <div class="col-span-5">
            <div class="min-w-full">
                <x-dropdown width="w-full" align="left">
                    <x-slot name="trigger">
                        <x-input wire:model.live="fields.song" class="!min-w-full"
                                 placeholder="Intitulé de la chanson"/>
                    </x-slot>
                    <x-dropdown.item label="Help Center"/>
                    <x-dropdown.item separator label="Live Chat"/>
                    <x-dropdown.item separator label="Logout"/>
                </x-dropdown>
            </div>
        </div>
        <div class="col-span-1">
            <x-input wire:model.live="fields.pages_number}" placeholder="Page" type="number"/>
        </div>
    </div>
</div>
