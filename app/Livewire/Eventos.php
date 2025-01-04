<?php

namespace App\Livewire;

use App\Models\Evento;
use Livewire\Component;
use Livewire\WithPagination;

class Eventos extends Component
{
    use WithPagination;
    public function paginationView()
    {
        return 'vendor.livewire.custom-pagination-links-view';
    }
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
        $this->emit('swalDefaultSuccess', 'Guardado correctamente.');
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
        $categoria          = Evento::where('id_evento', $id)->first();

        $this->id_evento    = $categoria->id_evento;
        $this->nombre       = $categoria->nombre;
        $this->fecha_ini    = $categoria->fecha_ini;
        $this->fecha_fin    = $categoria->fecha_fin;
    }
    public function deleteRecord(Evento $evento)
    {
        // Storage::disk('public')->delete($categoria->ruta_img);
        $categoria->delete();
        $this->emit('swalDefaultSuccess', 'Registro eliminado correctamente.');
    }
}
