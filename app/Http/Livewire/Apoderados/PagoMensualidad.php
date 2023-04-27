<?php

namespace App\Http\Livewire\Apoderados;

use Livewire\Component;

class PagoMensualidad extends Component
{   public $plan,$matricula,$proporcional,$siguiente,$valor_plan;

    public function render()
    {
        return view('livewire.apoderados.pago-mensualidad');
    }

    public function set_plan($id){
        $this->plan=$id;
        if($this->plan==1){
            $this->matricula=20000;
            $this->proporcional=26000;
            $this->siguiente=True;
        }
        if($this->plan==2){
            $this->matricula=20000;
            $this->valor_plan=150000;
        }
        if($this->plan==3){
            $this->matricula=0;
            $this->valor_plan=290000;
        }
        if($this->plan==4){
            $this->matricula=0;
            $this->valor_plan=580000;
        }
    }

    public function plan_clean(){
        $this->plan=NULL;
        $this->matricula=NULL;
        $this->proporcional=NULL;
        $this->siguiente=False;
        $this->valor_plan=NULL;
    }
}
