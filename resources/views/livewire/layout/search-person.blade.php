<div>
    <div class="flex flex-col justify-center">
        <div class="ml-6 mb-4">
            <x-input-label class="uppercase">Buscar</x-input-label>
            <x-text-input class="w-4/5" id="query" wire:model="query" placeholder="Escriba el nombre del personal a buscar..."></x-text-input>
            <x-primary-button class="w-1/6" wire:click="search"><div class="w-full">Buscar</div></x-primary-button>
        </div>
        <div class="flex justify-center gap-5">
            <div class="flex gap-2">
                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                       wire:model="category"
                       type="radio"
                       id="staffByActivity"
                       value="1">
                <label for="staffByActivity">Por actividad</label>
            </div>
            <div class="flex gap-2">
                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                       wire:model="category"
                       type="radio"
                       id="retired"
                       value="2">
                <label for="retired">Jubilados</label>
            </div>
            <div class="flex gap-3">
                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                       wire:model="category"
                       type="radio"
                       id="sf_staff"
                       value="3">
                <label for="sf_staff">Personal SF</label>
            </div>
            <div class="flex gap-2">
                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                       wire:model="category"
                       type="radio"
                       id="c_staff"
                       value="4">
                <label for="c_staff">Personal empresas</label>
            </div>
            <div class="flex gap-2">
                <input class="bg-gray-50 border border-[#111e60] rounded-lg focus:ring-[#111e60] focus:border-[#111e60] p-2.5"
                       wire:model="category"
                       type="radio"
                       id="beneficiaries"
                       value="5">
                <label for="beneficiaries">Beneficiarios</label>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-4">
        <div class="mb-4 w-full">

        </div>
    </div>
</div>

