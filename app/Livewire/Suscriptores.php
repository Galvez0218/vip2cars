<?php

namespace App\Livewire;

use App\Models\Evento;
use App\Models\Suscriptores as ModelsSuscriptores;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Suscriptores extends Component
{
    use WithPagination;

    public $eventos, $search;

    public $id_suscriptores, $id_evento, $nombres, $apellidos, $correo, $celular, $genero, $nro_documento;

    public function mount()
    {
        $this->id_evento = 'default';

        $this->eventos = Evento::orderBy('nombre', 'ASC')->get();
    }
    public function render()
    {
        $records = ModelsSuscriptores::with('evento')
            ->orderBy('id_suscriptor', 'DESC')->paginate(10);

        // dd($records);
        return view('livewire.suscriptores', ['records' => $records]);
    }
    public function save()
    {

        $this->validate([
            'nombres' => 'required',
            'id_evento' => 'required| not_in:default',
            'apellidos' => 'required',
            'correo' => 'required',
            'celular' => 'required',
            'nro_documento' => 'required',
        ]);

        \App\Models\Suscriptores::updateOrInsert([
            'id_suscriptor' => $this->id_suscriptores,
        ], [
            'id_evento' => $this->id_evento,
            'nombres' => strtoupper($this->nombres),
            'apellidos' => $this->apellidos,
            'correo' => $this->correo,
            'celular' => $this->celular,
            'genero' => $this->genero,
            'nro_documento' => $this->nro_documento,
        ]);
        $this->resetInputs();
    }
    public function resetInputs()
    {
        $this->id_suscriptores    = null;
        $this->id_evento    = null;
        $this->nombres       = null;
        $this->apellidos    = null;
        $this->correo    = null;
        $this->celular    = null;
        $this->genero    = null;
        $this->nro_documento    = null;
    }
    public function edit($id)
    {
        $suscriptor = \App\Models\Suscriptores::where('id_suscriptor', $id)->first();

        $this->id_suscriptores      = $suscriptor->id_suscriptor;
        $this->nombres              = $suscriptor->nombres;
        $this->id_evento            = $suscriptor->id_evento;
        $this->apellidos            = $suscriptor->apellidos;
        $this->correo               = $suscriptor->correo;
        $this->celular              = $suscriptor->celular;
        $this->genero               = $suscriptor->genero;
        $this->nro_documento        = $suscriptor->nro_documento;
    }
    public function delete($id)
    {
        DB::table('suscriptores')->where('id_suscriptor', $id)->delete();
    }
}
