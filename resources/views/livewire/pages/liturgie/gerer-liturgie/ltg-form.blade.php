<div x-data="{chronologie: }">
    @for($c=0;$c<$maxChrono ;$c++)
        <form wire:submit.prevent="formHandler">
            <x-button.circle xs primary icon="plus" wire:click.prevent="incrementMaxChrono"/>

            <div class="grid grid-cols-10 space-x-4 my-2">
                <div class="col-span-2">
                    <x-input placeholder="Nom" wire:model.live="fields.name.{{$c}}"/>
                </div>
                <div class="col-span-6">
                    <div class="min-w-full">
                        <x-dropdown width="w-full" align="left">
                            <x-slot name="trigger">
                                <x-input wire:model.live="fields.song.{{$c}}" class="!min-w-full"
                                         placeholder="Intitulé de la chanson"/>
                            </x-slot>
                            <x-dropdown.item label="Help Center"/>
                            <x-dropdown.item separator label="Live Chat"/>
                            <x-dropdown.item separator label="Logout"/>
                        </x-dropdown>
                    </div>
                    @if(array_key_exists($c, $fields['song'] ) && $fields['song'][$c]!=='')
                    <x-button.circle class="mt-2" xs positive icon="plus" wire:click.prevent="incrementMaxChrono"/>
                    @endif
                </div>
                <div class="col-span-1">
                    <x-input wire:model.live="fields.pages_number.{{$c}}" placeholder="Page" type="number"/>
                </div>
                <div>
                    <x-button.circle type="submit" positive icon="check"/>
                    <x-button.circle negative icon="x" wire:click.prevent="decrementMaxChrono"/>
                </div>
            </div>

        </form>
    @endfor
    <x-button.circle xs primary icon="plus" wire:click.prevent="incrementMaxChrono"/>
</div>
