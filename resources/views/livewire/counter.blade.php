<?php

use function Livewire\Volt\{state};

state(['count' => 0]);

$increment = fn() => $this->count++;

?>

<div class="mx-auto w-11">
    <h1 class="pb-3 text-xl font-bold text-center">{{ $count }}</h1>
    <button wire:click="increment" class="btn btn-primary">+</button>
</div>
