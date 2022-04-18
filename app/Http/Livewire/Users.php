<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $ids;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $password;
    public function resetInput()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone = '';
        $this->password = '';
    }
    public function store()
    {
        $validUser = $this->validate([
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:11',
            'password' => 'required',
        ]);
        User::create($validUser);
        $this->resetInput();
        session()->flash('message', 'User Has Been Created Successfully');
        $this->emit('userCreated');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $this->ids = $user->id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->password = $user->password;
    }

    public function update(){
        $validUser = $this->validate([
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:11',
            'password' => 'required',
        ]);
        User::where('id', $this->ids)->update($validUser);
        session()->flash('message', 'User Has Been Updated Successfully');
        $this->resetInput();
        $this->emit('userUpdated');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User Has Been Deleted Successfully');
        $this->emit('userDeleted');
    }


    public function render()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('livewire.users', compact('users'));
    }
}
