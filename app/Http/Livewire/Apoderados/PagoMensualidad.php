<?php

namespace App\Http\Livewire\Apoderados;

use App\Models\Suscripcion;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class PagoMensualidad extends Component
{   public $plan,$matricula,$proporcional,$siguiente,$valor_plan,$suscrip;
    public $selectedTransfencia, $selectedMercadopago, $titulo, $file;

    use WithFileUploads;

    public function mount(){
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
            $this->proporcional=26000;
            $this->siguiente=True;
            $this->titulo="Plan Mensual";
        }
        if($this->plan==2){
            $this->matricula=20000;
            $this->valor_plan=150000;
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

    public function suscripcion_store(){
        $rules = [
            'plan'=>'required'            
            ];
        $this->validate ($rules);

        if($this->plan==1){
            $valor=106000;
            $date=date('Y-m-d', strtotime(Carbon::now()."+ 1 month"));
        }
        if($this->plan==2){
            $valor=170000;
            $date=date('Y-m-d', strtotime(Carbon::now()."+ 3 month"));
        }
        if($this->plan==3){
            $valor=290000;
            $date=date('Y-m-d', strtotime(Carbon::now()."+ 6 month"));
        }
        if($this->plan==4){
            $valor=580000;
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
    }

    public function suscrip_destroy(Suscripcion $suscripcion){
        $suscripcion->delete();
        $this->plan=NULL;
        $this->matricula=NULL;
        $this->proporcional=NULL;
        $this->siguiente=False;
        $this->valor_plan=NULL;
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
        
    }


}
