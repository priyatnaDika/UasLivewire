<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\Game;

class Home extends Component
{
    
    public $creator,$class, $developer, $game,  $creator_id,$search;
    public $isModal = 0;

  	
    public function render()
    {
        $games = Game::all();
        $search = '%'.$this->search.'%';
        $this->class = Kelas::where('creator','LIKE',$search)
        ->orWhere('developer','LIKE',$search)
        ->orderBy('created_at', 'DESC')->get(); 
        return view('livewire.home',compact('games'))->layout('layouts.template');
    }

    
    public function create()
    {
        
        $this->resetFields();
        
        $this->openModal();
    }


    public function closeModal()
    {
        $this->isModal = false;
    }


    public function openModal()
    {
        $this->isModal = true;
    }


    public function resetFields()
    {
        $this->creator = '';
        $this->game = '';
        $this->developer = '';
        $this->creator_id = '';
 
    }


    public function store()
    {
        
        $this->validate([
            'creator' => 'required|string',
            'game' => 'required',
            'developer' => 'required',
        ]);


        Kelas::updateOrCreate(['id' => $this->creator_id], [
            'creator' => $this->creator,
            'game' => $this->game,
            'developer' => $this->developer
        ]);

        
        session()->flash('message', $this->creator_id ? $this->creator . ' Diperbaharui': $this->creator . ' Ditambahkan');
        $this->closeModal(); 
        $this->resetFields(); 
    }

    
    public function edit($id)
    {
        $class = Kelas::find($id); 
        
        $this->creator_id = $id;
        $this->creator = $class->creator;
        $this->game = $class->game;
        $this->developer = $class->developer;
        $this->openModal(); 
    }

    public function delete($id)
    {
        $kelas = Kelas::find($id); 
        $kelas->delete(); 
        session()->flash('message', $kelas->kelas . ' Dihapus'); 
    }
}