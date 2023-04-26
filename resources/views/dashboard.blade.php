<x-app-layout>
   @php
   $cant=0;

       foreach($recepcions as $recepcion){
           $cant+=$recepcion->peso_neto;
       }
      

   @endphp
   

   <div class="mt-2 sm:mt-4 mb-4 w-full grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-x-4 gap-y-2 items-center content-center">
      <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-4 my-2 mx-4">
         <div class="flex items-center">
            <div class="flex-shrink-0">
               <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><h1 class="block text-2xl font-bold">Hola<br> {{Auth()->user()->name}}</h1></span>
               <h3 class="text-base font-normal text-gray-500">Administrador</h3>
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
      @can('Ver produccion_total')
         <a href="{{ route('production.index') }}">
            <div class="max-w-xl  bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 my-2 mx-4">
               <div class="flex items-center">
                  <div class="flex-shrink-0">
                     <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{number_format($recepcions->count())}}</span>
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
   
   <div class="mx-20 bg-white dark:bg-gray-900">
      <div class="container px-6 py-8 mx-auto">
          <p class="text-xl text-center text-gray-500 dark:text-gray-300">
              Choose your plan
          </p>

          <h1 class="mt-4 text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">Pricing Plan</h1>
      
          
          <div class="mt-6 space-y-8 xl:mt-12">
              <div class="flex items-center justify-between max-w-2xl px-8 py-4 mx-auto border cursor-pointer rounded-xl dark:border-gray-700">
                  <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                      </svg>

                      <div class="flex flex-col items-center mx-5 space-y-1">
                          <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">Basic</h2>
                          <div class="px-2 text-xs text-blue-500 bg-gray-100 rounded-full sm:px-4 sm:py-1 dark:bg-gray-700 ">
                              Save 20%
                          </div>
                      </div>
                  </div>
                  
                  <h2 class="text-2xl font-semibold text-gray-500 sm:text-4xl dark:text-gray-300">$49 <span class="text-base font-medium">/Month</span></h2>
              </div>

              <div class="flex items-center justify-between max-w-2xl px-8 py-4 mx-auto border border-blue-500 cursor-pointer rounded-xl">
                  <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                      </svg>

                      <div class="flex flex-col items-center mx-5 space-y-1">
                          <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">Popular</h2>
                          <div class="px-2 text-xs text-blue-500 bg-gray-100 rounded-full sm:px-4 sm:py-1 dark:bg-gray-700 ">
                              Save 20%
                          </div>
                      </div>
                  </div>
                  
                  <h2 class="text-2xl font-semibold text-blue-600 sm:text-4xl">$99 <span class="text-base font-medium">/Month</span></h2>
              </div>

              <div class="flex items-center justify-between max-w-2xl px-8 py-4 mx-auto border cursor-pointer rounded-xl dark:border-gray-700">
                  <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                      </svg>

                      <div class="flex flex-col items-center mx-5 space-y-1">
                          <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">Enterprise</h2>
                          <div class="px-2 text-xs text-blue-500 bg-gray-100 rounded-full sm:px-4 sm:py-1 dark:bg-gray-700 ">
                              Save 20%
                          </div>
                      </div>
                  </div>
                  
                  <h2 class="text-2xl font-semibold text-gray-500 sm:text-4xl dark:text-gray-300">$149 <span class="text-base font-medium">/Month</span></h2>
              </div>

              <div class="flex justify-center">
                  <button class="px-8 py-2 tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                      Choose Plan
                  </button>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
