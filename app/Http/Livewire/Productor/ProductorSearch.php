<?php

namespace App\Http\Livewire\Productor;

use App\Models\Matricula;
use App\Models\Suscripcion;
use App\Models\Sync;
use App\Models\Telefono;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ProductorSearch extends Component
{   use WithPagination;

    public $search, $cellid,$userid, $phone, $valor, $date, $valor2, $date2, $user, $ctd=25;

    public function render()
    {   $users=User::where('rut','LIKE','%'. $this->search .'%')
                ->orwhere('email','LIKE','%'. $this->search .'%')
                ->orwhere('name','LIKE','%'. $this->search .'%')
                ->orwhere('csg','LIKE','%'. $this->search .'%')
                ->orwhere('idprod','LIKE','%'. $this->search .'%')
                ->orwhere('user','LIKE','%'. $this->search .'%')
                ->latest('id')->paginate($this->ctd);
        $allusers=User::all();
        $sync=Sync::where('entidad','PRODUCTORES')
        ->orderby('id','DESC')
        ->first();

        return view('livewire.productor.productor-search',compact('users','allusers','sync'));
    }


    public function limpiar_page(){
        $this->resetPage();
    }

    public function set_idcell($id){
        $this->cellid=$id;
        $this->user=User::find($this->cellid);
        $this->userid=NULL;
    }

    public function set_iduser($id){
        $this->userid=$id;
        $this->user=User::find($this->userid);
        $this->cellid=NULL;
    }

    public function cellid_clean(){
        $this->cellid=NULL;
        $this->user=NULL;
    }

    public function userid_clean(){
        $this->userid=NULL;
        $this->user=NULL;
    }

    public function storephone(){
        $rules = [
            'phone'=>'required',
        ];
       
        $this->validate ($rules);

        $telefono = Telefono::create([
            'numero'=> $this->phone,
            'user_id'=>$this->cellid
        ]);
        
        $this->reset(['phone']);
        $this->user->ForceFill([
            'updated_at'=> Carbon::now()
        ])->save();
        $this->user = User::find($this->cellid);

    }
    public function phone_destroy(Telefono $telefono){
        $telefono->delete();
        $this->user->ForceFill([
            'updated_at'=> Carbon::now()
        ])->save();
        $this->user=User::find($this->cellid);
    }

    public function suscripcion_destroy(Suscripcion $suscripcion){
        if($suscripcion->comprobante){
            Storage::delete($suscripcion->comprobante);
        }
        
        $suscripcion->delete();
        $this->user->ForceFill([
            'updated_at'=> Carbon::now()
        ])->save();
        $this->user=User::find($this->userid);
    }

    public function matricula_destroy(Matricula $matricula){
        $matricula->delete();
        $this->user->ForceFill([
            'updated_at'=> Carbon::now()
        ])->save();
        $this->user=User::find($this->userid);
    }

    public function suscripcion_store(){
       
        Suscripcion::create([
            'user_id'=>$this->user->id,
            'valor'=> $this->valor,
            'estado'=> 1,
            'end_date'=>$this->date 
        ]);

        $this->reset(['valor','date']);
       
    }

    public function matricula_store(){
       
        Matricula::create([
            'user_id'=>$this->user->id,
            'valor'=> $this->valor2,
            'estado'=> 1,
            'end_date'=>$this->date2 
        ]);

        $this->reset(['valor2','date2']);
       
    }

    

}
