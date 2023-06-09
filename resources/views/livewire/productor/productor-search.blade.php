<div>
    <div class="pb-12">
        <div class="sm:px-6 w-full">
            <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->

            <div class="px-6 py-4">
                <input wire:keydown="limpiar_page" wire:model="search"  class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre o email del usuario" autocomplete="off">
            </div>
    
      
          
               

                <div class="sm:flex items-center justify-between my-2">

 
                    <div class="max-w-7xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-4 mx-12">
                       <div class="flex items-center justify-center">
                          <div class="flex-shrink-0 text-center">
                             <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{number_format($allusers->count())}}</span>
                             <h3 class="text-base font-normal text-gray-500">Usuarios</h3>
                          </div>
                         
                       </div>
                    </div>
               
                <div class="flex justify-center mb-2 items-center content-center"> 
                    
                    <select wire:model="ctd" class="max-w-xl  mx-2 bg-gray-200 border border-gray-200 text-gray-700 py-3 px-6 rounded focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="25" class="text-left px-10">25 </option>
                        <option value="50" class="text-left px-10">50 </option>
                        <option value="100" class="text-left px-10">100 </option>
                        <option value="500" class="text-left px-10">500 </option>
                        
                    </select>
                </div>
            </div>

  <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            
            



                    <x-table-responsive>   
                        <table class="min-w-full divide-y divide-gray-200 mb-20 pb-20">
        
                            <thead class="bg-gray-50">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th class="text-center">Reset Password</th>
                                <th>CELULAR</th>
                                <th>EMAIL</th>
                                <th class="text-left">Fecha Vencimiento<br>Plan</th>
                                <th class="text-left">Fecha Vencimiento<br>Matricula</th>
                                
                                <th>Estado</th>
                            </thead>
                            <tbody>
                                @php
                                    $n=1;
                                @endphp
                                
                                @foreach ($users->reverse() as $user)
                                                    @php
                                                        $m=1;
                                                    @endphp
                                                @foreach ($user as $item)
                                            {{-- comment        {{$m}}) {{$item}}<br>
                                                    --}}
                                                        @php
                                                            $m+=1;
                                                        @endphp
                                                @endforeach
                                                
                                    
                                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                        <td class="text-center">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">

                                            

                                                @if ($user->id)
                                                    {{$user->id}}
                                                    
                                                @endif
                                            
                                                
                                            </p>
                                        
                                        </td>
                                        <td class="">
                                            <div class="flex items-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">

                                                
                                                    @if ($user->name)
                                                    {{$user->name}}
                                                    
                                                    @endif
                                                
                                                    
                                                </p>
                                            
                                            </div>
                                        </td>
                                       
                                        <td class="pl-5">
                                        

                                        
                                        <button  class="mx-4 focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-gray-500 hover:bg-gray-500 focus:outline-none rounded">

                                            <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center text-white font-bold inline w-full" >gre1234</h1>
                                        </button>
                                        
                                                
                                        
                                    
                                        
                                    
                                       </td>
                                    
                                        <td class="pl-5 flex justify-center">
                                            @if ($user->id==$cellid)
                                                <button wire:click="cellid_clean" class="mx-4 focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-green-500 hover:bg-green-500 focus:outline-none rounded">

                                                    <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center text-white font-bold inline w-full" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                            <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z" clip-rule="evenodd" />
                                                        </svg>
                                                        
                                                    </h1>
                                                </button>
                                            @else
                                                @if ($user->telefonos->count())
                                                    <button wire:click="set_idcell({{$user->id}})" class="mx-4 focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-green-500 hover:bg-green-500 focus:outline-none rounded">

                                                        <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center text-white font-bold inline w-full" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                                <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z" clip-rule="evenodd" />
                                                            </svg>
                                                            
                                                        </h1>
                                                    </button>
                                                @else
                                                    <button wire:click="set_idcell({{$user->id}})" class="mx-4 focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-gray-500 hover:bg-gray-500 focus:outline-none rounded">

                                                        <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center text-white font-bold inline w-full" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                                <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z" clip-rule="evenodd" />
                                                            </svg>
                                                            
                                                        </h1>
                                                    </button>
                                                @endif

                                            @endif
                                                                                        
                                        </td>
                                        <td class="pl-5">
                                            <div class="flex items-center">
                                            
                                                <p class="text-sm leading-none text-gray-600 ml-2">
                                                @if ($user->email)
                                                    {{$user->email}}
                                                @endif
                                                </p>
                                            </div>
                                        </td>
                                        @php
                                            $estado_matricula='INACTIVO';
                                            if($user->suscripcions){
                                                foreach ($user->suscripcions as $item) {
                                                    if ($item->estado==1) {
                                                        $estado_matricula='ACTIVO';
                                                        break;
                                                    }
                                                }
                                            }
                                        @endphp
                                        
                                        <td class="">
                                            <div class="flex items-center whitespace-nowrap">
                                            
                                                <p class="whitespace-nowrap text-base font-medium leading-none text-gray-700 mr-2">
                                                    @if ($user->suscripcions->count())
                                                        {{date('d M Y', strtotime($item->end_date))}}
                                                        
                                                        @else
                                                    <button wire:click="userid_clean" class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">-</button>
                                                    @endif
                                                </p>
                                            </div>
                                        </td>
                                        @php
                                            $estado='INACTIVO';
                                            if($user->matriculas){
                                                foreach ($user->matriculas as $matricula) {
                                                    if ($matricula->estado==1) {
                                                        $estado='ACTIVO';
                                                        break;
                                                    }
                                                }
                                            }
                                        @endphp
                                        <td class="">
                                            <div class="flex items-center whitespace-nowrap">
                                            
                                                <p class="whitespace-nowrap text-base font-medium leading-none text-gray-700 mr-2">
                                                    @if ($user->matriculas->count())
                                                        {{date('d M Y', strtotime($matricula->end_date))}}
                                                        
                                                    @else
                                                    <button wire:click="userid_clean" class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">-</button>
                                                    @endif
                                                </p>
                                            </div>
                                        </td>
                                    
                                        <td class="pl-5">
                                           
                                            @if ($user->id==$userid)
                                                @if ($estado=='ACTIVO')
                                                    <button wire:click="userid_clean" class="py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded">{{$estado}}</button>
                                                @else
                                                    <button wire:click="userid_clean" class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">{{$estado}}</button>
                                                @endif
                                            @else
                                                @if ($estado=='ACTIVO')
                                                    <button wire:click="set_iduser({{$user->id}})" class="py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded">{{$estado}}</button>
                                                @else
                                                    <button wire:click="set_iduser({{$user->id}})" class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">{{$estado}}</button>
                                                @endif

                                            @endif

                                        </td>
                                              
                                    </tr>
                                @if ($cellid==$user->id)

                                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                      
                                            <td class="pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">

                                            
                                                
                                            </p>
                                            
                                        
                                            
                                            <td class="pl-5">
                                            

                                            
                                        
                                            
                                        
                                            </td>
                                        
                                            <td class="pl-5 text-center items-center content-center">

                                                @if ($user->telefonos)
                                                    @foreach ($user->telefonos as $telefono)
                                                    <div class="flex text-center justify-center items-center content-center">
                                                        <b>{{$telefono->numero}}  </b>
                                                        <p wire:click="phone_destroy({{$telefono}})" class="text-red-500 cursor-pointer ml-1"> (X)</p>

                                                    </div>
                                                        <br>
                                                        
                                                    @endforeach
                                                    
                                                @endif

                                            
                                            
                                            
                                            </td>
                                            <td class="pl-5">
                                                <div class="flex items-center">
                                                
                                                    
                                                    <div class="flex items-center">
                                                        <label class="w-32 mx-2"><strong>Agregar:</strong></label>
                                                        <input wire:model="phone" class="form-input w-full border-2 border-gray-300 bg-white h-10 rounded-lg text-sm focus:outline-none">
                                                    </div>
                                    
                                                    @error('name')
                                                        <span class="text-sm text-red-500">{{$message}}</span>
                                                    @enderror
                                                
                                                
                                                    <button wire:click="storephone" class="mx-4 focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-green-500 hover:bg-green-500 focus:outline-none rounded">

                                                        <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center text-white font-bold inline w-full" >
                                                            +
                                                            
                                                        </h1>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="pl-5">
                                                <div class="flex items-center">
                                                
                                                    <p class="text-base font-medium leading-none text-gray-700 mr-2">

                                                        
                                                    </p>
                                                </div>
                                            </td>
                                        </td>
                                        <td class="pl-5 whitespace-nowrap">
                                            <p class="whitespace-nowrap  text-base flex font-medium leading-none text-gray-700 mr-2">

                                                

                                                
                                            </p>
                                            
                                        </td>
                                        
                                            <td class="pl-5">
                                        
                                            </td>
                                            <td class="pl-4">
                                            
                                            </td>
                                            <td>
                                           
                                        </td>
                                    </tr>

                                @endif
                                @if ($userid==$user->id)

                                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                    
                                            <td class="pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">

                                            
                                                
                                            </p>
                                            
                                        
                                            
                                            
                                        
                                            <td class="pl-5 text-center items-center content-center">

                                                @if ($user->matriculas)
                                                    @foreach ($user->matriculas as $suscripcion)
                                                    <div class="flex text-center justify-center items-center content-center">
                                                       
                                                        @switch($suscripcion->estado)
                                                            @case(1)
                                                            <p class="whitespace-nowrap">ACTIVA - {{date('d/m/Y', strtotime($suscripcion->end_date))}} - ${{number_format($suscripcion->valor)}}</p>
                                                                @break
                                                            @case(2)
                                                            <p class="whitespace-nowrap">INACTIVA - {{date('d/m/Y', strtotime($suscripcion->end_date))}} - ${{number_format($suscripcion->valor)}} </p>
                                                                @break
                                                            @case(3)
                                                               <p class="whitespace-nowrap">PENDIENTE - {{date('d/m/Y', strtotime($suscripcion->end_date))}} - ${{number_format($suscripcion->valor)}}</p> 
                                                                @break
                                                            @case(4)
                                                               <p class="whitespace-nowrap"> RECHAZADA - {{date('d/m/Y', strtotime($suscripcion->end_date))}} - ${{number_format($suscripcion->valor)}}</p>
                                                                @break
                                                            @case(5)
                                                               <p class="whitespace-nowrap"> BLOQUEADA - {{date('d/m/Y', strtotime($suscripcion->end_date))}} - ${{number_format($suscripcion->valor)}}</p>
                                                                @break
                                                            
                                                            @default
                                                                
                                                        @endswitch
                                                      
                                                        <p wire:click="matricula_destroy({{$suscripcion}})" class="text-red-500 cursor-pointer ml-1"> (X)</p>

                                                    </div>
                                                        <br>
                                                        
                                                    @endforeach
                                                    
                                                @endif

                                            
                                            
                                            
                                            </td>
                                            <td class="pl-5">
                                                <div class="flex items-center">
                                                
                                                    
                                                    <div class="flex items-center">
                                                        <label class="w-32 mx-2"><strong>Agregar Matricula:</strong></label>
                                                        <input type="number" wire:model="valor2" class="form-input w-full border-2 border-gray-300 bg-white h-10 rounded-lg text-sm focus:outline-none">
                                                        <input type="date" wire:model="date2" class="form-input w-full border-2 border-gray-300 bg-white h-10 rounded-lg text-sm focus:outline-none">
                                                    </div>
                                    
                                                    @error('name')
                                                        <span class="text-sm text-red-500">{{$message}}</span>
                                                    @enderror
                                                
                                                
                                                    <button wire:click="matricula_store" class="mx-4 focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-green-500 hover:bg-green-500 focus:outline-none rounded">

                                                        <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center text-white font-bold inline w-full" >
                                                            +
                                                            
                                                        </h1>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="pl-5">
                                                <div class="flex items-center">
                                                
                                                    <p class="text-base font-medium leading-none text-gray-700 mr-2">

                                                        
                                                    </p>
                                                </div>
                                            </td>
                                        
                                        <td class="pl-5 text-center items-center content-center">

                                            @if ($user->suscripcions)
                                                @foreach ($user->suscripcions as $suscripcion)
                                                <div class="flex text-center justify-center items-center content-center">
                                                   
                                                    @switch($suscripcion->estado)
                                                            @case(1)
                                                            <p class="whitespace-nowrap">ACTIVA - {{date('d/m/Y', strtotime($suscripcion->end_date))}} - ${{number_format($suscripcion->valor)}}</p>
                                                                @break
                                                            @case(2)
                                                            <p class="whitespace-nowrap">INACTIVA - {{date('d/m/Y', strtotime($suscripcion->end_date))}} - ${{number_format($suscripcion->valor)}} </p>
                                                                @break
                                                            @case(3)
                                                               <p class="whitespace-nowrap">PENDIENTE - {{date('d/m/Y', strtotime($suscripcion->end_date))}} - ${{number_format($suscripcion->valor)}}</p> 
                                                                @break
                                                            @case(4)
                                                               <p class="whitespace-nowrap"> RECHAZADA - {{date('d/m/Y', strtotime($suscripcion->end_date))}} - ${{number_format($suscripcion->valor)}}</p>
                                                                @break
                                                            @case(5)
                                                               <p class="whitespace-nowrap"> BLOQUEADA - {{date('d/m/Y', strtotime($suscripcion->end_date))}} - ${{number_format($suscripcion->valor)}}</p>
                                                                @break
                                                            
                                                            @default
                                                                
                                                        @endswitch
                                                  
                                                    <p wire:click="suscripcion_destroy({{$suscripcion}})" class="text-red-500 cursor-pointer ml-1"> (X)</p>

                                                </div>
                                                    <br>
                                                    
                                                @endforeach
                                                
                                            @endif

                                        
                                        
                                        
                                        </td>
                                        <td class="pl-5">
                                            <div class="flex items-center">
                                            
                                                
                                                <div class="flex items-center">
                                                    <label class="w-32 mx-2"><strong>Agregar Suscripción:</strong></label>
                                                    <input type="number" wire:model="valor" class="form-input w-full border-2 border-gray-300 bg-white h-10 rounded-lg text-sm focus:outline-none">
                                                    <input type="date" wire:model="date" class="form-input w-full border-2 border-gray-300 bg-white h-10 rounded-lg text-sm focus:outline-none">
                                                </div>
                                
                                                @error('name')
                                                    <span class="text-sm text-red-500">{{$message}}</span>
                                                @enderror
                                            
                                            
                                                <button wire:click="suscripcion_store" class="mx-4 focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-green-500 hover:bg-green-500 focus:outline-none rounded">

                                                    <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center text-white font-bold inline w-full" >
                                                        +
                                                        
                                                    </h1>
                                                </button>
                                            </div>
                                        </td>
                                        
                                           
                                            <td class="pl-4">
                                            
                                            </td>
                                            <td>
                                        
                                        </td>
                                    </tr>

                                @endif


                                @endforeach
                            
                            
                            </tbody>
                        </table>
                    </x-table-responsive>
                    @if ($users->count())
                        <div class="">
                            {{$users->links()}}
                        </div>
                   
                    @endif 
            </div>

        </div>
    </div>
</div>
