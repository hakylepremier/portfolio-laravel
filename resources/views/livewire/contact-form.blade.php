<?php

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Mary\Traits\Toast;

use function Livewire\Volt\{state, rules, uses};

uses([Toast::class]);

state([
    'name' => null,
    'email' => null,
    'message' => null,
]);

rules([
    'name' => 'required|string|max:255',
    'email' => 'required|string|email',
    'message' => 'required|string|max:255',
]);

$save = function () {
    $validated = $this->validate();
    Mail::to('hakylepremier@gmail.com')->send(new ContactMessage($validated));
    $this->success('Your message has been sent successfully');
    $this->reset();
};

?>

<div class="bg-gray-900 card">
    <x-form wire:submit="save" class="card-body">
        <x-input label="Name" wire:model="name" placeholder="Enter your name" icon="o-user"
            class="dark:border-accent dark:bg-gray-800" clearable />

        <x-input label="E-mail" wire:model="email" placeholder="Enter your email" icon="o-envelope"
            class="dark:bg-gray-800 dark:border-accent" clearable />

        <x-textarea label="Message" wire:model="message" placeholder="Enter your message"
            class="dark:bg-gray-800 dark:border-accent" hint="Max 1000 chars" rows="5" />

        <x-slot:actions>
            {{-- <x-button label="Cancel" /> --}}
            <x-button label="Submit" class="text-white btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>
</div>
