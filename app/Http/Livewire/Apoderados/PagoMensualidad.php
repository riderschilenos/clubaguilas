<?php

namespace App\Http\Livewire\Apoderados;

use App\Models\Suscripcion;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class PagoMensualidad extends Component
{   public $plan,$matricula,$proporcional,$valor_plan,$suscrip;
    public $selectedTransfencia, $selectedMercadopago,$titulo, $file,$now,$suscripcion_activa,$suscripcion_rechazada;
    public $siguiente=True;
    use WithFileUploads;

    public function mount(){
        $this->now = Carbon::now();
        $this->suscripcion_activa=Suscripcion::where('user_id',auth()->user()->id)
                                ->where('estado',1)
                                ->first();
        $this->suscripcion_rechazada=Suscripcion::where('user_id',auth()->user()->id)
                                ->where('estado',4)
                                ->first();
        $suscripcion=Suscripcion::where('user_id',auth()->user()->id)
                ->where('estado',2)
                ->first();
        if($suscripcion){
            
            if($suscripcion->metodo=='TRANSFERENCIA'){
                $this->selectedTransfencia=TRUE;
                $this->selectedMercadopago=FALSE;
            }
            if($suscripcion->metodo=='MERCADOPAGO'){
                $this->selectedTransfencia=FALSE;
                $this->selectedMercadopago=TRUE;
            }
        

            if($suscripcion->valor>10000){
               $this->titulo="Plan Mensual";
            }
            if($suscripcion->valor>150000){
               $this->titulo="Plan Trimestral";
            }
            if($suscripcion->valor>280000){
               $this->titulo="Plan Semestral";
            }
            if($suscripcion->valor>570000){
                $this->titulo="Plan Anual";
            }
        }
    }

    public function render()
    {   $suscripcion=Suscripcion::where('user_id',auth()->user()->id)
                ->where('estado',2)
                ->orwhere('estado',3)
                ->first();
                
        return view('livewire.apoderados.pago-mensualidad',compact('suscripcion'));
    }

    public function set_plan($id){
        $this->plan=$id;
        if($this->plan==1){
            $this->matricula=20000;
            
            $this->proporcional=2000*((date('t', strtotime($this->now)))-date('d', strtotime($this->now)));
            
            if($this->siguiente==True){
                $this->valor_plan=20000+$this->proporcional+60000;
            }else{
                $this->valor_plan=20000+$this->proporcional;
            };

            $this->titulo="Plan Mensual";
        }
        if($this->plan==2){
            $this->matricula=20000;
            $this->valor_plan=170000;
            $this->titulo="Plan Trimestral";
        }
        if($this->plan==3){
            $this->matricula=0;
            $this->valor_plan=290000;
            $this->titulo="Plan Semestral";
        }
        if($this->plan==4){
            $this->matricula=0;
            $this->valor_plan=580000;
            $this->titulo="Plan Anual";
        }
    }

    public function set_siguiente(){
        if($this->siguiente==True){
            $this->siguiente==False;
            $this->proporcional=2000*((date('t', strtotime($this->now)))-date('d', strtotime($this->now)));
            $this->valor_plan=20000+$this->proporcional;
            $this->plan=1;
        }elseif($this->siguiente==False){
            $this->siguiente==True;
            $this->proporcional=2000*((date('t', strtotime($this->now)))-date('d', strtotime($this->now)));
            $this->valor_plan=20000+$this->proporcional+60000;
            $this->plan=1;
        }
    }

    public function suscripcion_store(){
        $rules = [
            'plan'=>'required'            
            ];
        $this->validate ($rules);

        if($this->plan==1){
            $valor=$this->valor_plan;
            $date=date('Y-m-d', strtotime(Carbon::now()."+ ".((date('t', strtotime($this->now)))-date('d', strtotime($this->now)))." days"));
            
            if($this->siguiente==TRUE){
                $date=date('Y-m-d', strtotime($date."+ 1 month"));
            }
                

        }
        if($this->plan==2){
            $valor=$this->valor_plan;
            $date=date('Y-m-d', strtotime(Carbon::now()."+ 3 month"));
        }
        if($this->plan==3){
            $valor=$this->valor_plan;
            $date=date('Y-m-d', strtotime(Carbon::now()."+ 6 month"));
        }
        if($this->plan==4){
            $valor=$this->valor_plan;
            $date=date('Y-m-d', strtotime(Carbon::now()."+ 1 year"));
        }


        $this->suscrip = Suscripcion::create([
            'user_id'=>auth()->user()->id,
            'valor'=> $valor,
            'end_date'=>$date 
        ]);

        $this->reset(['plan','matricula','proporcional','siguiente','valor_plan','suscrip']);
       
    }

    

    public function plan_clean(){
        $this->plan=NULL;
        $this->matricula=NULL;
        $this->proporcional=NULL;
        $this->siguiente=False;
        $this->valor_plan=NULL;
        $this->siguiente=True;
    }

    public function suscrip_destroy(Suscripcion $suscripcion){
        $suscripcion->delete();
        $this->plan=NULL;
        $this->matricula=NULL;
        $this->proporcional=NULL;
        $this->siguiente=False;
        $this->valor_plan=NULL;
        $this->siguiente=True;
    }

    public function updateselectedtransferencia(Suscripcion $suscripcion){

        $suscripcion->metodo='TRANSFERENCIA';
        $suscripcion->save();
        return redirect()->route('dashboard');
    }

    public function updateselectedmercadopago(Suscripcion $suscripcion){

        $suscripcion->metodo='MERCADOPAGO';
        $suscripcion->save();
        return redirect()->route('dashboard');

    }

    public function enviar(Suscripcion $suscripcion)
    {   
        if($this->file){
                
            $foto = Str::random(10).$this->file->getClientOriginalName();
            $rutafoto = public_path().'/storage/comprobantes/'.$foto;
            $img=Image::make($this->file)->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutafoto);
            $img->orientate();
            $suscripcion->estado=3;
            $suscripcion->comprobante=$foto;
            
            $suscripcion->save();

        }else{
            $foto='nn';
        }

        

        $this->reset(['file']);
        return redirect()->route('dashboard');
        
    }


}
