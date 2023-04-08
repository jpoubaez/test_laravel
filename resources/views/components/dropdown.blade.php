
@props(['trigger'])

<div x-data="{show: false}" @click.away="show = false"> {{-- el div de sota depen de show --}}
    {{-- Trigger  --}}
    <div @click="show = !show"> 
        {{ $trigger }}
    </div>

    
    {{-- enllaços del desplegable  --}}
    <div x-show="show" class="py-2 absolute bg-gray-300 w-full mt-2 rounded-xl z-50 overflow-auto max-h-52" style="display:none;">
        {{ $slot }} {{-- el tros que ja esta al fitxer que crida el component  --}}
    </div>
</div>
