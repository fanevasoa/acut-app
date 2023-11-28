<div>
    <x-card title="Définir la session regroupement:">
        <form wire:submit.prevent="formHandler">
            <div class="flex-col justify-start">
                <x-datetime-picker label="Date du jour :" wire:model="fields.date"
                                   display-format="dddd DD MMMM YYYY à HH:mm" without-timezone time-format="24"/>
                <x-input label="Thème :" wire:model="fields.theme"/>
                <x-input label="Nom :" wire:model="fields.name"/>
                <x-select label="Type :" wire:model="fields.type" :options="$listeTypeOptions" option-label="label" option-value="value"/>
                <x-textarea label="Introduction:" wire:model="fields.introduction"/>
            </div>

            <div class="flex justify-between items-center pt-2">
                <x-button positive type="submit" label="Enregistrer"/>
                <x-button negative label="Annuler"/>
            </div>
        </form>
    </x-card>
</div>
