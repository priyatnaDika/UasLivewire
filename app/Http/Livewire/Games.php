<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Game;
use App\Models\Genre;

class Games extends Component
{
    public $games, $game,  $status, $game_id,$genre,$search;
    public $isModal = 0;

    public function render()
    {
        $genres = Genre::all();
        $search = '%'.$this->search.'%';
        $this->games = Game::where('game','LIKE',$search)
        ->orWhere('genre','LIKE',$search)
        ->orderBy('created_at', 'DESC')->get();
        
        return view('livewire.games',compact('genres'))->layout('layouts.template');
    }

    public function creategames()
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
        $this->game = '';
        $this->genre= '';
        $this->game_id = '';

    }

    public function store()
    {
        $this->validate([
            'game' => 'required',
            'genre' => 'required',
        ]);

        Game::updateOrCreate(['id' => $this->game_id], [
            'game' => $this->game,
            'genre' => $this->genre,
            
        ]);

        session()->flash('message', $this->game_id ? $this->game . ' Diperbaharui': $this->game . ' Ditambahkan');
        $this->closeModal(); 
        $this->resetFields();
    }

    public function edit($id)
    {
        $game = Game::find($id);
        $this->game_id = $id;
        $this->game = $game->game;
        $this->genre = $game->genre;

        $this->openModal(); 
    }

    public function delete($id)
    {
        $game = Game::find($id); 
        $game->delete(); 
        session()->flash('message', $game->name . ' Dihapus');
    }

    // public function show(Game $games)
    // {
    //     return view('livewire.show', compact('games'));
    // }

    // public function detail($id)
    // {
    //     $game = Game::find($id);
    //     return view('detail.details', ['details'=>$id]);
    // }
}