<?php

namespace App\Http\Requests;

interface Transferable
{
    public function toDTO(): array;
}
