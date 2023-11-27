<div x-data="{chronologie: 0}">


    @for($c=0;$c<$maxChrono ;$c++)
        <form wire:submit.prevent="formHandler({{$c}})">
            <div>
                <x-button.circle xs primary icon="plus" wire:click.prevent="insertProgrammeSession({{$c}})"
                                 :id="rand(1,999999)"/>
            </div>
            <div class="grid grid-cols-10 space-x-4 my-2">
                <div class="col-span-2">
                    <x-input placeholder="Nom" wire:model="fields.{{$c}}.name" id="random()" :id="rand(1,999999)"/>
                </div>
                <div>
                    <x-select placeholder="Type" wire:model="fields.{{$c}}.type" option-label="label"
                              option-value="value" :options="$optionList" id="random()" :id="rand(1,999999)"/>
                </div>
                <div class="col-span-6">
                    <livewire:pages.utils.song-form :fields="$fields[$c]['songs']"
                        wire:key="{{rand(1,999999)}}"/>
                </div>
                <div class="flex-row w-full">
                    <x-button rounded type="submit" positive icon="check" label="Save" id="random()" />
                    <x-button rounded rose icon="x" label="Cancel"
                              wire:click.prevent="removeProgrammeSession({{$c}})" :id="rand(1,999999)"/>
                </div>
            </div>
        </form>
    @endfor

    <div class="flex justify-between">
    <x-button.circle xs primary icon="plus" wire:click.prevent="insertProgrammeSession({{$maxChrono}})"
                     :id="rand(1,999999)"/>
    <x-button negative md label="Annuler" x-on:click="openFrom=false"/>
</div>
</div>
