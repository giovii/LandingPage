<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Subscribers extends Component
{
    public $showEdit = false;
    public Subscriber $subscriber;
    public $changeEmail = '';
    public $search ='';
    protected $queryString= [
        'search' => ['except' => '']
    ];
    public function delete(Subscriber $subscriber)
    {
        $subscriber->delete();
    }

    public function edit(Subscriber $subscriber)
    {
        $this->subscriber=$subscriber;
        $this->changeEmail=$subscriber->email;
        $this->showEdit= true;
        //$subscriber->delete();
    }
    public function applyEdit(Subscriber $subscriber)
    {
        $flight =  Subscriber::where('id',$subscriber->id)->first();

        $flight->email = $this->changeEmail;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ;

        $flight->save();
        //$subscriber1= Subscriber::where('id',$subscriber->id);
        //$sub
        //$subscriber1->email =$this->subscriber->email;
        //$subscriber1->save();
        //$this->showEdit= false;
        //$subscriber->delete();
    }

    public function render()
    {
        $subscribers = Subscriber::where("email",'like',"%{$this->search}%")->get();
        return view('livewire.subscribers')->with([
            'subscribers' => $subscribers,
        ]);
    }
}
