<div class="relative flex justify-center" x-data="{openFrom: $persist(false).as('gerer-liturgy-form')}">
    <div class="w-5/6 py-6">
        <x-button positive md label="Creer une nouvel planning liturgique " x-on:click="openFrom=true"/>
        <div x-show="openFrom" class="pt-4">
            <livewire:pages.utils.groupment-form />
            <div class="my-6">
                <span class="text-2xl font-bold">Organiser de deroulement de votre regroupement</span>
            </div>
            <livewire:pages.liturgie.gerer-liturgie.ltg-form wire:key="ltg_form"/>
        </div>
    </div>
</div>
