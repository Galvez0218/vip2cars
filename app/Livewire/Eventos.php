<?php

namespace App\Livewire;

use App\Models\Evento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Eventos extends Component
{
    use WithPagination;
    public $search;
    public $id_evento, $nombre, $fecha_ini, $fecha_fin;

    public function render()
    {
        $records = Evento::when($this->search, function ($q) {
            return $q->where('nombre', 'like', '%' . $this->search . '%');
        })
            ->orderBy('id_evento', 'DESC')->paginate(10);

        return view('livewire.eventos', ['records' => $records]);
    }

    public function save()
    {
        $this->validate([
            'nombre' => 'required',
            'fecha_ini' => 'required',
            'fecha_fin' => 'required',
        ]);

        Evento::updateOrInsert([
            'id_evento' => $this->id_evento,
        ], [
            'nombre' => strtoupper($this->nombre),
            'fecha_ini' => $this->fecha_ini,
            'fecha_fin' => $this->fecha_fin,
        ]);
        $this->resetInputs();
    }
    public function resetInputs()
    {
        $this->id_evento    = null;
        $this->nombre       = null;
        $this->fecha_ini    = null;
        $this->fecha_fin    = null;
    }
    public function edit($id)
    {
        $evento = Evento::where('id_evento', $id)->first();

        $this->id_evento    = $evento->id_evento;
        $this->nombre       = $evento->nombre;
        $this->fecha_ini    = $evento->fecha_ini;
        $this->fecha_fin    = $evento->fecha_fin;
    }
    public function delete($id)
    {
        DB::table('eventos')->where('id_evento', $id)->delete();
    }
}
