<div>
    @php
        // SDK de Mercado Pago
         require base_path('/vendor/autoload.php');
         // Agrega credenciales
         MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

                    
         // Crea un objeto de preferencia
         $preference = new MercadoPago\Preference();

         // Crea un ítem en la preferencia
         $item = new MercadoPago\Item();
        $item->title = 'Pago Club Aguilas';
        $item->quantity = 1;
        if($suscripcion){
            $item->unit_price = $suscripcion->valor;
        }else{
            $item->unit_price = 1000000;
        }

                        

        $preference = new MercadoPago\Preference();
        //...
        if($suscripcion){
        $preference->back_urls = array(
            "success" => "http://www.tu-sitio/failure",
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/failure"
        );
        $preference->auto_return = "approved";

        $preference->items = array($item);
        $preference->save();
            }

                     
    @endphp

    <div class="mx-4 px-4 md:mx-20 bg-white">
      <div class="container px-2 py-8 mx-auto">
        @if (IS_NULL($suscripcion))
            <div class="mx-auto px-6 text-center">
                <div class="mx-auto max-w-lg">
                <p class="mt-6 text-gray-500">Todos los alumnos al momento de ingresar deberán hacer pago de <b>Matricula</b>, esta consta de una duración de un año.</p>
                </div>
            </div>
        @endif

          
          <div class="bg-white">
            <div class="pb-8 ">
            @if ($suscripcion_activa)
                <div class='flex items-center justify-center my-12'>  <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                    <div class="flex w-full items-center justify-between border-b pb-3">
                        <div class="flex items-center space-x-3">
                            <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
                            <div class="text-lg font-bold text-slate-700">Roberto Moya</div>
                        </div>
                        <div class="flex items-center space-x-8">
                            <button class="hidden rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">Category</button>
                            <div class="hidden text-xs text-neutral-500">2 hours ago</div>
                        </div>
                        </div>
                    
                        <div class="mt-4 mb-6">
                        <div class="mb-3 text-xl font-bold">Hola, tu suscripcion esta activa hasta el: {{$suscripcion_activa->end_date}}</div>
                        <div class="text-sm text-neutral-600">Aliquam a tristique sapien, nec bibendum urna. Maecenas convallis dignissim turpis, non suscipit mauris interdum at. Morbi sed gravida nisl, a pharetra nulla. Etiam tincidunt turpis leo, ut mollis ipsum consectetur quis. Etiam faucibus est risus, ac condimentum mauris consequat nec. Curabitur eget feugiat massa</div>
                        </div>
                    
                        <div>
                        <div class="flex items-center justify-between text-slate-500">
                        
                        </div>
                        </div>
                    </div>
                </div>
            @else
                @if ($suscripcion)
                    @if ($suscripcion->estado==3)
                        <div class='flex items-center justify-center my-12'>  <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                            <div class="flex w-full items-center justify-between border-b pb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
                                    <div class="text-lg font-bold text-slate-700">Roberto Moya</div>
                                </div>
                                <div class="flex items-center space-x-8">
                                    <button class="hidden rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">Category</button>
                                    <div class="hidden text-xs text-neutral-500">2 hours ago</div>
                                </div>
                                </div>
                            
                                <div class="mt-4 mb-6">
                                <div class="mb-3 text-xl font-bold">Hola, estamos revisando el comprobante de pago, nos contactaremos a la inmediatez.</div>
                                <div class="text-sm text-neutral-600">Aliquam a tristique sapien, nec bibendum urna. Maecenas convallis dignissim turpis, non suscipit mauris interdum at. Morbi sed gravida nisl, a pharetra nulla. Etiam tincidunt turpis leo, ut mollis ipsum consectetur quis. Etiam faucibus est risus, ac condimentum mauris consequat nec. Curabitur eget feugiat massa</div>
                                </div>
                            
                                <div>
                                <div class="flex items-center justify-between text-slate-500">
                                
                                </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="lg:pr-10">
                                <div class="w-full mx-auto text-gray-800 font-light mb-6 border-b border-gray-200 pb-6">
                                    <div class="w-full flex items-center">
                                        <div class="overflow-hidden rounded-lg w-16 h-16 bg-gray-50 border border-gray-200">
                                            <img src="https://img.freepik.com/foto-gratis/jugador-hockey-partido-sobre-cesped_23-2149668519.jpg" class="w-16 h-16 objet-cover" alt="">
                                        </div>
                                        <div class="flex-grow pl-3">
                                            <h6 class="font-semibold uppercase text-gray-600">{{$titulo}}</h6>
                                            <p class="text-gray-400">x 1</p>
                                        </div>
                                        <div>
                                            
                                            <span class="font-semibold text-gray-600 text-xl">${{number_format($suscripcion->valor)}}</span><span class="font-semibold text-gray-600 text-sm"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6 pb-6 border-b border-gray-200 hidden">
                                    <div class="-mx-2 flex items-end justify-end">
                                        <div class="flex-grow px-2 lg:max-w-xs">
                                            <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Discount code</label>
                                            <div>
                                                <input class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="XXXXXX" type="text"/>
                                            </div>
                                        </div>
                                        <div class="px-2">
                                            <button class="block w-full max-w-xs mx-auto border border-transparent bg-gray-400 hover:bg-gray-500 focus:bg-gray-500 text-white rounded-md px-5 py-2 font-semibold">APPLY</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6 pb-6 border-b border-gray-200 text-gray-800">
                                    <div class="w-full flex items-center">
                                        <div class="flex-grow">
                                            <span class="text-gray-600">Duración</span>
                                        </div>
                                        <div class="pl-3">
                                            <span class="font-semibold">{{$titulo}}</span>
                                        </div>
                                    </div>
                                    <div class="w-full flex mb-3 items-center">
                                        <div class="flex-grow">
                                            <span class="text-gray-600">Subtotal</span>
                                        </div>
                                        <div class="pl-3">
                                            <span class="font-semibold">${{number_format($suscripcion->valor)}}</span>
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="mb-6 pb-6 border-b border-gray-200 md:border-none text-gray-800 text-xl">
                                    <div class="w-full flex items-center">
                                        <div class="flex-grow">
                                            <span class="text-gray-600">Total</span>
                                        </div>
                                        <div class="pl-3">
                                            <span class="font-semibold">${{number_format($suscripcion->valor)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white w-full h-54 rounded-xl py-6 flex items-center justify-around">
                                        
                                <div class="text-center">
                                
                            
                                                    <div class="form-group">
                                                
                                                            <p class="px-12 pb-4">Selecciona el método de pago:</p>
                                                            @if ($suscripcion->metodo=='TRANSFERENCIA')
                                                                <div class="form-group flex justify-center mx-4">
                                                                    <div class="flex form-check">
                                                                    <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" checked wire:click="updateselectedtransferencia({{$suscripcion->id}})">
                                                                    <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800">
                                                                        <img class="h-14 w-28 object-contain" src="{{asset('image/transferencia.png')}}" alt="">
                                                                    </label>
                                                                    </div>
                                                                    <div class="flex ml-4 form-check">
                                                                    <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" wire:click="updateselectedmercadopago({{$suscripcion->id}})">
                                                                    <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800" >
                                                                            <img class="h-14 w-28 object-contain" src="{{asset('image/mercadopago.png')}}" alt="">
                                                                    </label>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="form-group flex justify-center mx-4">
                                                                    <div class="flex form-check">
                                                                    <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4"  wire:click="updateselectedtransferencia({{$suscripcion->id}})">
                                                                    <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800">
                                                                        <img class="h-14 w-28 object-contain" src="{{asset('image/transferencia.png')}}" alt="">
                                                                    </label>
                                                                    </div>
                                                                    <div class="flex ml-4 form-check">
                                                                    <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" checked wire:click="updateselectedmercadopago({{$suscripcion->id}})">
                                                                    <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800" >
                                                                            <img class="h-14 w-28 object-contain" src="{{asset('image/mercadopago.png')}}" alt="">
                                                                    </label>
                                                                    </div>
                                                                </div>
                                                                
                                                            @endif
                                                            
                                                            
                                                    
                                    
                                                    </div>

                                            
                                                    @if ($suscripcion->metodo=='TRANSFERENCIA')
                                                        
                                                                <div>
                                                                    <h1 class="text-xl font-bold text-center py-2 mt-4">Adjunte Comprobante por: ${{number_format($suscripcion->valor)}}</h1>

                                                                    <p>Banco de Chile<br>
                                                                        Cta vista NRO 32620352<br>
                                                                        Rut:17.137.526-6<br>
                                                                        Roberto moya miranda<br>
                                                                        Clubhockeymachali@gmail.com</p>

                                                                    <hr class="w-full">

                                                                    <div class="text-white  text-md font-bold px-4" wire:loading wire:target="file">
                                                                        <img class="h-14" src="{{asset('image/cargando.gif')}}" alt="">
                                                                    </div>
                                                                
                                                                        <input wire:model="file" type="file" class="form-input flex-1 bg-gray-200 mx-4">                                      
                                                                    
                                                                    

                                                                <div class="flex justify-center">

                                                                    <button wire:click="suscrip_destroy({{$suscripcion->id}})" class="mt-6 rounded-lg bg-red-600 px-6 py-2.5 text-center text-sm font-medium capitalize leading-5 text-white hover:bg-red-500 focus:outline-none mx-2 lg:w-auto">Cancelar</button>
                                                                    <button wire:click="enviar({{$suscripcion->id}})" class="mt-6 rounded-lg bg-gray-600 px-6 py-2.5 text-center text-sm font-medium capitalize leading-5 text-white hover:bg-gray-500 focus:outline-none mx-2 lg:w-auto">Enviar</button>
                                                                
                                                                </div> 
                                                    @else
                                                    
                                                            <div class="cho-container flex justify-center mt-2 mb-4">
                                                                <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                                                            </div>
                                                    @endif
                                            
                                
                                </div>
                            </div>
                        </div>
                    @endif
                @else
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
                            @if ($plan==1)
                                <div wire:click="set_siguiente" class="flex justify-between items-center border-b border-slate-200 py-3 px-2 border-l-4  border-l-transparent bg-gradient-to-r from-transparent to-transparent hover:from-slate-100 transition ease-linear duration-150">
                                    <div class="inline-flex items-center space-x-2">
                                        <div>
                                            <svg wire:click="set_siguiente" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500 hover:text-indigo-600 hover:cursor-pointer">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                                                    
                                        </div>
                                        <div wire:click="set_siguiente">Siguiente Mes</div>
                                    </div>
                                    <div wire:click="set_siguiente">
                                    $60.000           
                                    </div>
                                </div>
                            @endif
                            @if ($plan>1)
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
                                
                                        ${{number_format($valor_plan)}}
                                        
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button wire:click="plan_clean" class="mt-6 rounded-lg bg-red-600 px-6 py-2.5 text-center text-sm font-medium capitalize leading-5 text-white hover:bg-red-500 focus:outline-none mx-2 lg:w-auto">Cancelar</button>
                            <button wire:click="suscripcion_store" class="mt-6 rounded-lg bg-green-600 px-6 py-2.5 text-center text-sm font-medium capitalize leading-5 text-white hover:bg-green-500 focus:outline-none mx-2 lg:w-auto">Pagar</button>
                        
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
                                        1 Mes
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
                                        3 Meses
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
                                        6 Meses
                                    </li>
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
                                        1 año
                                        </li>
                                        
                                    </ul>
            
                            <button wire:click="set_plan(4)" class="inline-flex items-center justify-center px-4 py-2 font-semibold text-white uppercase transition-colors bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none">
                                SELECCIONAR
                            </button>
                            </div>

                        </div>
                    @endif
                @endif
            @endif
            </div>
        </div>
      </div>
  </div>
  <script src="https://sdk.mercadopago.com/js/v2"></script>
  
  <script>
  // Agrega credenciales de SDK
  const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
          locale: 'es-AR'
  });
  
  // Inicializa el checkout
  mp.checkout({
      preference: {
          id: '{{ $preference->id }}'
      },
      render: {
              container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
              label: 'Pagar', // Cambia el texto del botón de pago (opcional)
      }
  });
  </script>
</div>
