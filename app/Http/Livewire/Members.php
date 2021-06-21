<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member;
use App\Models\Game;
use App\Models\Kelas;

class Members extends Component
{
    public $members, $status,$guru, $member_id, $game, $developer,$search;
    public $isModal = 0;

  	
    public function render()
    {
        $class = Kelas::all();
        $games = Game::all();
        $search = '%'.$this->search.'%';
        $this->members = Member::where('guru','LIKE',$search)
        ->orWhere('game','LIKE',$search)
        ->orWhere('developer','LIKE',$search)
        ->orderBy('created_at', 'DESC')->get(); 
        return view('livewire.members',compact('games','class'))->layout('layouts.template');
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

        $this->guru = '';
        $this->status = '';
        $this->member_id = '';
        $this->game = '';
        $this->developer = '';
    }


    public function store()
    {
        
        $this->validate([

            'guru' => 'required|string',
            'game' => 'required',
            'developer' => 'required'
        ]);


        Member::updateOrCreate(['id' => $this->member_id], [

            'guru' => $this->guru,
            'game' => $this->game,
            'status' => $this->status,
            'developer' => $this->developer,
        ]);

        
        session()->flash('message', $this->member_id ? $this->guru . ' Diperbaharui': $this->guru . ' Ditambahkan');
        $this->closeModal(); 
        $this->resetFields(); 
    }

    
    public function edit($id)
    {
        $member = Member::find($id); 
        
        $this->member_id = $id;
        $this->guru = $member->guru;
        $this->game = $member->game;
        $this->developer = $member->developer;
        $this->status = $member->status;

        $this->openModal(); 
    }

    public function delete($id)
    {
        $member = Member::find($id); 
        $member->delete(); 
        session()->flash('message', $member->guru . ' Dihapus'); 
    }
}