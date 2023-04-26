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

         <div class="container mx-auto px-6 text-center">
            <div class="mx-auto max-w-lg">
            <p class="mt-6 text-gray-500 dark:text-gray-300">Todos los alumnos al momento de ingresar deberán hacer pago de <b>Matricula</b>, esta consta de una duración de un año.</p>
            <button class="mt-6 rounded-lg bg-green-600 px-6 py-2.5 text-center text-sm font-medium capitalize leading-5 text-white hover:bg-green-500 focus:outline-none lg:mx-0 lg:w-auto">Ver disponibilidad de clase de prueba</button>
            </div>
        </div>

          
          <div class="bg-white dark:bg-gray-800">
            <div class="container px-6 py-8 mx-auto">
                <div class="flex flex-col items-center justify-center space-y-8 lg:-mx-4 lg:flex-row lg:items-stretch lg:space-y-0">
                    <div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-white border-2 border-gray-200 rounded-lg lg:mx-4 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex-shrink-0">
                            <h2 class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-blue-400 uppercase rounded-lg bg-gray-50 dark:bg-gray-700">
                                Casual
                            </h2>
                        </div>
                        <div class="flex-shrink-0">
                            <span
                                class="pt-2 text-4xl font-bold text-gray-800 uppercase dark:text-gray-100"
                            >
                                Free
                            </span>
                        </div>
                        <ul class="flex-1 space-y-4">
                            <li class="text-gray-500 dark:text-gray-400">
                                Up to 5 projects
                            </li>
                            <li class="text-gray-500 dark:text-gray-400">
                                Up to 10 collaborators
                            </li>
                            <li class="text-gray-500 dark:text-gray-400">
                                2Gb of storage
                            </li>
                        </ul>
        
                        <button
                            class="inline-flex items-center justify-center px-4 py-2 font-semibold text-white uppercase transition-colors bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none"
                        >
                            Start free
                        </button>
                    </div>
        
                    <div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-white border-2 border-gray-200 rounded-lg lg:mx-4 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex-shrink-0">
                            <h2
                                class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-blue-400 uppercase rounded-lg bg-gray-50 dark:bg-gray-700"
                            >
                                Profesional
                            </h2>
                        </div>
                        <div class="flex-shrink-0">
                            <span
                                class="pt-2 text-4xl font-bold text-gray-800 uppercase dark:text-gray-100"
                            >
                                $24.90
                            </span>
                            <span class="text-gray-500 dark:text-gray-400">
                                /month
                            </span>
                        </div>
                        <ul class="flex-1 space-y-4">
                            <li class="text-gray-500 dark:text-gray-400">
                                Up to 10 projects
                            </li>
                            <li class="text-gray-500 dark:text-gray-400">
                                Up to 20 collaborators
                            </li>
                            <li class="text-gray-500 dark:text-gray-400">
                                10Gb of storage
                            </li>
                            <li class="text-gray-500 dark:text-gray-400">
                                Real-time collaborations
                            </li>
                        </ul>
        
                        <button
                            class="inline-flex items-center justify-center px-4 py-2 font-semibold text-white uppercase transition-colors bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none"
                        >
                            Start free trial
                        </button>
                    </div>
        
                    <div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-white border-2 border-gray-200 rounded-lg lg:mx-4 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex-shrink-0">
                            <h2
                                class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-blue-400 uppercase rounded-lg bg-gray-50 dark:bg-gray-700"
                            >
                                Expert
                            </h2>
                        </div>
                        <div class="flex-shrink-0">
                            <span
                                class="pt-2 text-4xl font-bold text-gray-800 uppercase dark:text-gray-100"
                            >
                                $49.90
                            </span>
                            <span class="text-gray-500 dark:text-gray-400">
                                /month
                            </span>
                        </div>
                        <ul class="flex-1 space-y-4">
                            <li class="text-gray-500 dark:text-gray-400">
                                Unlimited projects
                            </li>
                            <li class="text-gray-500 dark:text-gray-400">
                                Unlimited collaborators
                            </li>
                            <li class="text-gray-500 dark:text-gray-400">
                                Unlimited storage
                            </li>
                            <li class="text-gray-500 dark:text-gray-400">
                                Real-time collaborations
                            </li>
                            <li class="text-gray-500 dark:text-gray-400">
                                24x7 Support
                            </li>
                        </ul>
        
                        <button class="inline-flex items-center justify-center px-4 py-2 font-semibold text-white uppercase transition-colors bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none">
                            Start free trial
                        </button>
                    </div>
                    <div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-white border-2 border-gray-200 rounded-lg lg:mx-4 dark:bg-gray-800 dark:border-gray-700">
                     <div class="flex-shrink-0">
                         <h2
                             class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-blue-400 uppercase rounded-lg bg-gray-50 dark:bg-gray-700"
                         >
                             Expert
                         </h2>
                     </div>
                     <div class="flex-shrink-0">
                         <span
                             class="pt-2 text-4xl font-bold text-gray-800 uppercase dark:text-gray-100"
                         >
                             $49.90
                         </span>
                         <span class="text-gray-500 dark:text-gray-400">
                             /month
                         </span>
                     </div>
                     <ul class="flex-1 space-y-4">
                         <li class="text-gray-500 dark:text-gray-400">
                             Unlimited projects
                         </li>
                         <li class="text-gray-500 dark:text-gray-400">
                             Unlimited collaborators
                         </li>
                         <li class="text-gray-500 dark:text-gray-400">
                             Unlimited storage
                         </li>
                         <li class="text-gray-500 dark:text-gray-400">
                             Real-time collaborations
                         </li>
                         <li class="text-gray-500 dark:text-gray-400">
                             24x7 Support
                         </li>
                     </ul>
     
                     <button class="inline-flex items-center justify-center px-4 py-2 font-semibold text-white uppercase transition-colors bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none">
                         Start free trial
                     </button>
                 </div>
                </div>
            </div>
        </div>
      </div>
  </div>
</x-app-layout>
