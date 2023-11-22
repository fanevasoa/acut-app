<div>
    <x-notifications align="center" blur="md" z-index="z-50" />
    <div class=" font-bold text-4xl text-center py-5 text-gray-600">
        Calendrier
    </div>
    <div class=" flex justify-center">
        <div class="w-5/6">
            <div class="grid grid-cols-6 space-x-8">
                <x-datetime-picker label="Date de début" placeholder="Date de début" without-timezone without-time
                                   wire:model.live="filters.minDate"
                                   display-format="dddd DD MMMM YYYY "/>
                <x-datetime-picker label="Date de fin" placeholder="Date de fin" without-timezone without-time
                                   wire:model.live="filters.maxDate"
                                   display-format="dddd DD MMMM YYYY "/>
            </div>

            <table class="my-6 w-full bg-white rounded-lg shadow-lg p-2">
                <thead>
                @foreach($colonnes as $col)
                    <th>{{$col}}</th>
                @endforeach
                </thead>

                <tbody>
                @for($d=0; $d<31; $d++)
                    <tr>
                        @foreach($colonnes as $m)
                            <td class="text-center">{{$days[$m][$d] ?? ''}}</td>
                        @endforeach
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
