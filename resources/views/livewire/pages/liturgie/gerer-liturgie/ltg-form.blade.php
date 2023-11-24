<div x-data="{chronologie: 0}">
    @for($c=0;$c<$maxChrono ;$c++)
        <form wire:submit.prevent="formHandler"  id="random()">
            <x-button.circle xs primary icon="plus" wire:click.prevent="insertProgrammeSession({{$c}})" :id="rand(1,999999)"/>

            <div class="grid grid-cols-10 space-x-4 my-2">
                <div class="col-span-2">
                    <x-input placeholder="Nom" wire:model.live="fields.{{$c}}.name"  id="random()" :id="rand(1,999999)"/>
                </div>
                <div>
                    <x-select placeholder="Type" wire:model="fields.{{$c}}.type" option-label="label"
                              option-value="value" :options="$optionList"  id="random()"  :id="rand(1,999999)"/>
                </div>
                <div class="col-span-6">
                    @for($cs=0; $cs < $maxChronoSong[$c]; $cs++)
                    <div class="grid grid-cols-6">
                        <x-select xs placeholder="Ordre"  id="random()"  :id="rand(1,999999)"/>
                        <div class="col-span-4">
                            <livewire:pages.liturgie.gerer-liturgie.components.song-form wire:key="{{rand(1,999999)}}"/>
                        </div>
                        <x-button.circle pink icon="x" wire:click.prevent="decrementMaxChronoSong({{$c}})"   :id="rand(1,999999)"/>
                    </div>
                    @endfor
                    <x-button.circle class="mt-2" xs positive icon="plus" wire:click.prevent="incrementMaxChronoSong({{$c}})"   :id="rand(1,999999)"/>
                </div>
                <div class="w-full">
                    <x-button rounded type="submit" positive icon="check" label="Save"  id="random()"/>
                    <x-button rounded negative icon="x" label="Cancel" wire:click.prevent="removeProgrammeSession({{$c}})"  :id="rand(1,999999)"/>
                </div>
            </div>
        </form>
    @endfor
    <x-button.circle xs primary icon="plus" wire:click.prevent="insertProgrammeSession({{$maxChrono}})"    :id="rand(1,999999)" />
</div>
