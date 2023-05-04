<x-app-layout>
   @php
   $cant=0;
   $cant2=0;

       foreach($recepcions as $recepcion){
           $cant+=$recepcion->peso_neto;
       }
       
      

   @endphp
   
<div class="flex justify-center"></div>
   <div class="max-w-7xl mx-auto mt-2 sm:mt-4 mb-4 w-full grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-x-4 gap-y-2 items-center content-center">
      <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-4 my-2 mx-4">
         <div class="flex items-center">
            <div class="flex-shrink-0">
               <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><h1 class="block text-2xl font-bold">Hola<br> {{Auth()->user()->name}}</h1></span>
               <h3 class="text-base font-normal text-gray-500">Bienvenido Socios Club Águilas Chile</h3>
            </div>
            
         </div>
      </div>
      @can('Ver usuarios registrados')
         <a href="{{ route('productors.index') }}">
            <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-4">
               <div class="flex items-center">
                  <div class="flex-shrink-0">
                     <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{number_format($users->count())}}</span>
                     <h3 class="text-base font-normal text-gray-500">Usuarios</h3>
                  </div>
                  <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold cursor-pointer">
                     VER TODOS
                     <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                     </svg>
                  </div>
               </div>
            </div>
         </a>
      @endcan
      @can('Ver usuarios registrados')
         @if ($suscripcions->count())
            <a href="{{ route('comprobantes.check') }}">
               <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-4">
                  <div class="flex items-center">
                     <div class="flex-shrink-0">
                        <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{number_format($suscripcions->count())}}</span>
                        <h3 class="text-base font-normal text-gray-500">Pago Pendiente</h3>
                     </div>
                     <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold cursor-pointer">
                        VER TODOS
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </div>
                  </div>
               </div>
            </a>
         @endif

      @endcan
      @can('Ver produccion_total')
         <a href="{{ route('production.index') }}">
            <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-4">
               <div class="flex items-center">
                  <div class="flex-shrink-0">
                     <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{number_format($suscripcions->count())}}</span>
                     <h3 class="text-base font-normal text-gray-500">Recepciones</h3>
                  </div>
                  <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold cursor-pointer">
                     VER TODOS
                     <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                     </svg>
                  </div>
               </div>
            </div>
         </a>
      @endcan
      @can('Ver produccion_cc')
         <a href="{{ route('productioncc.index') }}">
            <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-4">
               <div class="flex items-center">
                  <div class="flex-shrink-0">
                     <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{number_format($recepcions->count())}}</span>
                     <h3 class="text-base font-normal text-gray-500">Recepciones CC</h3>
                  </div>
                  <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold cursor-pointer">
                     VER TODOS
                     <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                     </svg>
                  </div>
               </div>
            </div>
         </a>
      @endcan
      @can('Ver produccion_propia')
         <a href="{{ route('productionpropia.index') }}">
            <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-4">
               <div class="flex items-center">
                  <div class="flex-shrink-0">
                     <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{number_format($prop_recep->count())}}</span>
                     <h3 class="text-base font-normal text-gray-500">Recepciones</h3>
                  </div>
                  <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold cursor-pointer">
                     VER TODOS
                     <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                     </svg>
                  </div>
               </div>
            </div>
         </a>
      @endcan
   </div>

   @can('Ver produccion_propia')
      @livewire('productor.production-show')
   @endcan
   
   @livewire('apoderados.pago-mensualidad')

   
</x-app-layout>
