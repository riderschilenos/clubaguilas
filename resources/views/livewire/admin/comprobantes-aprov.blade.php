<div class="flex justify-center">
    <div class="max-w-7xl grid grid-cols-1 md:grid-cols-3">
        @foreach ($suscripcions as $suscripcion)   
            <div class='flex items-center justify-center mt-6 from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2'>
                <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                    <div class='max-w-md mx-auto'>
                    <div class='h-[236px]' style='background-image:url({{Storage::url('comprobantes/'.$suscripcion->comprobante)}});background-size:cover;background-position:center'>
                    </div>
                    <div class='p-4 sm:p-6'>
                        
                        <div class='flex flex-row'>

                        <p class='text-[17px] font-bold text-[#0FB478]'>${{number_format($suscripcion->valor)}}</p>
                        </div>
                        <p class='text-[#7C7C80] font-[15px] mt-6 w-full'>{{$suscripcion->user->name.' - '.$suscripcion->user->email.' - '.$suscripcion->created_at}}</p>
            
            
                        <button wire:click="aprobar({{$suscripcion->id}})" class='text-white block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-green-500 rounded-[14px] hover:bg-green-600 focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                        Aprobar
                        </button>
                        <button wire:click="rechazar({{$suscripcion->id}})" class='text-white block mt-1.5 w-full px-4 py-3 font-medium tracking-wide text-center capitalize bg-red-500 transition-colors duration-300 transform rounded-[14px] hover:bg-red-600 focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                            Rechazar
                        </button>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>