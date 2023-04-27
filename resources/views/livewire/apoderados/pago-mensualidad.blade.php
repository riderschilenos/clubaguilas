<div>
    <div class="mx-20 bg-white dark:bg-gray-900">
      <div class="container px-6 py-8 mx-auto">

         <div class="mx-auto px-6 text-center">
            <div class="mx-auto max-w-lg">
            <p class="mt-6 text-gray-500 dark:text-gray-300">Todos los alumnos al momento de ingresar deberán hacer pago de <b>Matricula</b>, esta consta de una duración de un año.</p>
            </div>
        </div>

          
          <div class="bg-white dark:bg-gray-800">
            <div class="px-6 pb-8 mx-auto">

                @if ($plan) 

               
                    <div class="my-5 max-w-4xl justify-center content-center mx-auto">
                       
                        <div class="flex justify-between items-center border-b border-slate-200 py-3 px-2 border-l-4  border-l-transparent bg-gradient-to-r from-transparent to-transparent hover:from-slate-100 transition ease-linear duration-150">
                            <div class="inline-flex items-center space-x-2">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500 hover:text-indigo-600 hover:cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                                            
                                </div>
                                <div>Matricula</div>
                            </div>
                            <div>
                               ${{number_format($matricula)}}           
                            </div>
                        </div>
                        @if ($proporcional)
                            <div class="flex justify-between items-center border-b border-slate-200 py-3 px-2 border-l-4  border-l-transparent bg-gradient-to-r from-transparent to-transparent hover:from-slate-100 transition ease-linear duration-150">
                                <div class="inline-flex items-center space-x-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500 hover:text-indigo-600 hover:cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                                                
                                    </div>
                                    <div>Proporcional del Més</div>
                                </div>
                                <div>
                                    ${{number_format($proporcional)}}              
                                </div>
                            </div>
                        @endif
                        @if ($siguiente)
                            <div class="flex justify-between items-center border-b border-slate-200 py-3 px-2 border-l-4  border-l-transparent bg-gradient-to-r from-transparent to-transparent hover:from-slate-100 transition ease-linear duration-150">
                                <div class="inline-flex items-center space-x-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500 hover:text-indigo-600 hover:cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                                                
                                    </div>
                                    <div>Siguiente Mes</div>
                                </div>
                                <div>
                                $60.000           
                                </div>
                            </div>
                        @endif
                        @if ($valor_plan)
                            <div class="flex justify-between items-center border-b border-slate-200 py-3 px-2 border-l-4  border-l-transparent bg-gradient-to-r from-transparent to-transparent hover:from-slate-100 transition ease-linear duration-150">
                                <div class="inline-flex items-center space-x-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500 hover:text-indigo-600 hover:cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                                                
                                    </div>
                                    <div>
                                    @switch($plan)
                                        @case(1)
                                            Plan Menssual
                                            @break
                                        @case(2)
                                            Plan Trimestral
                                            @break
                                        @case(3)
                                            Plan Semestral
                                            @break
                                        @case(4)
                                            Plan Anual
                                            @break
                                        
                                        @default
                                            
                                    @endswitch
                                    </div>
                                </div>
                                <div>
                               ${{number_format($valor_plan)}}         
                                </div>
                            </div>
                        @endif

                        <div class="flex justify-between items-center border-b border-slate-200 py-3 px-2 border-l-4 border-l-indigo-300 bg-gradient-to-r from-indigo-100 to-transparent hover:from-indigo-200 transition ease-linear duration-150">
                            <div class="inline-flex items-center space-x-2">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500 hover:text-indigo-600 hover:cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                                            
                                </div>
                                <div>Total</div>
                            </div>
                            <div>
                                @switch($plan)
                                @case(1)
                                    $106.000
                                    @break
                                @case(2)
                                    $170.000
                                    @break
                                @case(3)
                                    $290.000
                                    @break
                                @case(4)
                                    $580.000
                                    @break
                                
                                @default
                                    
                            @endswitch           
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button wire:click="plan_clean" class="mt-6 rounded-lg bg-red-600 px-6 py-2.5 text-center text-sm font-medium capitalize leading-5 text-white hover:bg-red-500 focus:outline-none mx-2 lg:w-auto">Cancelar</button>
                        <button wire:click="plan_clean" class="mt-6 rounded-lg bg-green-600 px-6 py-2.5 text-center text-sm font-medium capitalize leading-5 text-white hover:bg-green-500 focus:outline-none mx-2 lg:w-auto">Pagar</button>
                    
                    </div> 
                    
                @else
                <div class="flex justify-center mb-6">
                    <button class="mt-4 rounded-lg bg-green-600 px-6 py-2.5 text-center text-sm font-medium capitalize leading-5 text-white hover:bg-green-500 focus:outline-none lg:mx-0 lg:w-auto">Ver disponibilidad de clase de prueba</button>
                </div> 
                    <div class="flex flex-col items-center justify-center space-y-8 lg:-mx-4 lg:flex-row lg:items-stretch lg:space-y-0">
                        
                        <div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-white border-2 border-gray-200 rounded-lg lg:mx-4 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex-shrink-0">
                                <h2 class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-blue-400 uppercase rounded-lg bg-gray-50 dark:bg-gray-700">
                                    Mensual
                                </h2>
                            </div>
                            <div class="flex-shrink-0">
                            <span class="pt-2 text-4xl font-bold text-gray-800 uppercase dark:text-gray-100">
                                $60.000
                            </span>
                            
                            </div>
                            <ul class="flex-1 space-y-4">
                                <li class="text-gray-500 dark:text-gray-400">
                                    No incluye matricula
                                </li>
                                <li class="text-gray-500 dark:text-gray-400">
                                    Up to 10 collaborators
                                </li>
                                <li class="text-gray-500 dark:text-gray-400">
                                    2Gb of storage
                                </li>
                            </ul>
            
                            <button wire:click="set_plan(1)" class="inline-flex items-center justify-center px-4 py-2 font-semibold text-white uppercase transition-colors bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none">
                                SELECCIONAR
                            </button>
                        </div>
            
                        <div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-white border-2 border-gray-200 rounded-lg lg:mx-4 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex-shrink-0">
                                <h2
                                    class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-blue-400 uppercase rounded-lg bg-gray-50 dark:bg-gray-700"
                                >
                                    Trimestral
                                </h2>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="pt-2 text-4xl font-bold text-gray-800 uppercase dark:text-gray-100">
                                $150.000
                                </span>
                            
                            </div>
                            <ul class="flex-1 space-y-4">
                                <li class="text-gray-500 dark:text-gray-400">
                                No incluye matricula
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
            
                            <button wire:click="set_plan(2)" class="inline-flex items-center justify-center px-4 py-2 font-semibold text-white uppercase transition-colors bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none"
                            >
                                SELECCIONAR
                            </button>
                        </div>
            
                        <div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-white border-2 border-gray-200 rounded-lg lg:mx-4 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex-shrink-0">
                                <h2
                                    class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-blue-400 uppercase rounded-lg bg-gray-50 dark:bg-gray-700"
                                >
                                    Semestral
                                </h2>
                            </div>
                            <div class="flex-shrink-0">
                            <span class="pt-2 text-4xl font-bold text-gray-800 uppercase dark:text-gray-100">
                                $290.000
                                </span>
                            </div>
                            <ul class="flex-1 space-y-4">
                                <li class="text-gray-500 dark:text-gray-400 font-bold">
                                Incluye matricula
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
            
                            <button wire:click="set_plan(3)" class="inline-flex items-center justify-center px-4 py-2 font-semibold text-white uppercase transition-colors bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none">
                                SELECCIONAR
                            </button>
                        </div>

                        <div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-white border-2 border-gray-200 rounded-lg lg:mx-4 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex-shrink-0">

                            <h2
                                class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-blue-400 uppercase rounded-lg bg-gray-50 dark:bg-gray-700"
                            >
                                Anual
                            </h2>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="pt-2 text-4xl font-bold text-gray-800 uppercase dark:text-gray-100">
                                    $580.000
                                    </span>
                                </div>
                                <ul class="flex-1 space-y-4">
                                    <li class="text-gray-500 dark:text-gray-400 font-bold">
                                    Incluye matricula
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
        
                        <button wire:click="set_plan(4)" class="inline-flex items-center justify-center px-4 py-2 font-semibold text-white uppercase transition-colors bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none">
                            SELECCIONAR
                        </button>
                        </div>

                    </div>
                @endif
            </div>
        </div>
      </div>
  </div>
</div>
