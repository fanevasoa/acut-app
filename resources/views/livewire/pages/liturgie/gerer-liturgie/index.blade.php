<div class="relative flex justify-center" x-data="{openFrom: $persist(false).as('gerer-liturgy-form')}">
    <div class="w-5/6 py-6">
        <x-notifications z-index="50" md right/>
        <x-button positive md label="Creer une nouvel planning liturgique " x-on:click="openFrom=true"/>
        <div x-show="openFrom" class="pt-4">
            <livewire:pages.utils.groupment-form/>
            @if(isset($liturgy) && count($liturgy)>0)
                <div class="grid grid-cols-4">
                    <div>
                        <span class="text-2xl font-bold text-gray-600">Date: </span>
                    </div>
                    <div class="relative col-span-3">
                        <span>{{\Carbon\Carbon::make($liturgy["date_regroupement"])->format('dd DD MM YY à HH:mm')}}</span>
                    </div>
                    <div>
                        <span class="text-2xl font-bold text-gray-600">Type: </span>
                    </div>
                    <div class="col-span-3">{{$liturgy['type_regroupement']}}</div>
                    <div>
                        <span class="text-2xl font-bold text-gray-600">Theme:</span>
                    </div>
                    <div class="col-span-3">{{$liturgy['theme']}}</div>
                    <div>
                        <span class="text-2xl font-bold text-gray-600">Introduction:</span>
                    </div>
                    <div class="col-span-3">{{$liturgy['description']}}</div>
                </div>
                <livewire:pages.liturgie.gerer-liturgie.ltg-form wire:key="ltg_form"/>
            @endif

        </div>
    </div>
</div>
