<div>
    <x-card title="Définir la session regroupement:">
        <form wire:submit.prevent="formHandler">
            <div class="flex-col justify-start">
                <div><x-datetime-picker label="Date du jour :" without-time/></div>
                <div>
                    <x-input label="Thème :"/></div>
                <div>
                    <x-input label="Nom :"/></div>
                <div>
                    <x-input label="Type :"/></div>
                <div>
                    <x-textarea label="Introduction:"/></div>

            </div>

            <x-slot name="footer">

                <div class="flex justify-between items-center">
                <x-button positive type="submit" label="Enregistrer"/>
                <x-button negative type="submit" label="Annuler"/>
                </div>
            </x-slot>
        </form>
    </x-card>

</div>
