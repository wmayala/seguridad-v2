<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retired;
use Barryvdh\DomPDF\Facade\Pdf;

class IDCardController extends Controller
{
    public function retiredCard($id)
    {
        $retired=Retired::findOrFail($id);

        $data=[
            'record'=>$retired->record,
            'name'=>$retired->name,
            'position'=>$retired->position,
            'dui'=>$retired->dui,
            'expirationDate'=>$retired->expirationDate,
            'photo'=>$retired->photo,
        ];

        return view('card.retired.front', compact('data'));
    }
}
