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
    <h1 class="mt-10 text-2xl font-bold text-center">Contabilidad Club Aguilas Chile</h1>
<div class="flex justify-center">
    <div class="mt-4">
        <x-table-responsive>
            
            
        
            @if ($suscripcions_ok->count())

                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                        Nro
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Método
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cantidad                       
                        </th>
                        
                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php
                            $counter=$suscripcions_ok->count();
                        
                        @endphp
                    @foreach ($suscripcions_ok as $pago)
                            @php
                                $counter-=1
                            
                            @endphp
                        
                            
                        
                            
                        
                                <tr>
                                    <td class="px-6 py-4 justify-center">
                                        <p class="text-center">{{$counter+1}}</p>
                                    
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        
                                        @if ($pago->metodo=="MERCADOPAGO")
                                            <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                MERCADOPAGO
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                TRANSFERENCIA
                                            </span>
                                            
                                    
                                        @endif
                                            
                                        
                                    </td>

                                
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 ml-3">${{number_format($pago->valor)}}</div>
                                        
                                    </td>
                                    
                                    

                                    

                                    <td class="px-6 py-4 whitespace-nowrap">    

                                        @switch($pago->estado)
                                            @case(1)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Pendiente de Aprobación
                                                </span>
                                                @break
                                            @case(2)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Aprobado
                                                </span>
                                                @break
                                        
                                                
                                            @endswitch
                                            
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        
                                        <div class="text-sm text-gray-900">{{$pago->created_at->format('d-m-Y')}}</div>    
                                    </td>
                                    {{-- comment 
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{route('vendedor.pedidos.edit',$pago)}}" class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>
                                        
                                    </td>--}}
                                </tr>
                    
                        @endforeach
                    <!-- More people... -->
                    </tbody>
                </table>

                <div class="card-footer">
                    {{$suscripcions_ok->links()}}
                </div>

            @else
                <div class="px-6 py-4">
                    No hay ningun retiro realizado
                </div>
            @endif 
            
        </x-table-responsive>
    </div>
</div>