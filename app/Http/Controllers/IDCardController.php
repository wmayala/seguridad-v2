<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retired;
use Intervention\Image\Facades\Image;

class IDCardController extends Controller
{
    public function retiredCard($id)
    {
        $retired=Retired::findOrFail($id);

        $width=1008;
        $height=637;

        $canvas=Image::canvas($width, $height * 2,'#ffffff');

        $photoPath = public_path('storage/' . $retired->photo);
        $logoPath = public_path('assets/img/logo_bcr.png');
        $signaturePath = public_path('assets/img/firma-removebg.png');
        $authSignaturePath = public_path('assets/img/gs-sign.jpeg');

        $data = [
            'record' => $retired->record,
            'name' => $retired->name,
            'position' => $retired->position,
            'dui' => $retired->dui,
            'expirationDate' => $retired->expiration_date,
        ];

        $front = Image::canvas($width, $height, '#ffffff');
        $front->insert(Image::make($photoPath)->fit(250, 300), 'top-left', 20, 20);
        $front->insert(Image::make($logoPath)->resize(120, null, function ($constraint)
        {
            $constraint->aspectRatio();
        }), 'top-left', 290, 30);

        $front->text('Banco Central de Reserva de El Salvador', 450, 50, function ($font) {
            $font->file(public_path('fonts/Arial Bold.ttf'));
            $font->size(20);
            $font->color('#111e60');
            $font->align('center');
        });

        $front->text("Exp. No.: {$data['record']}", 290, 120, function ($font) {
            $font->file(public_path('fonts/Arial.ttf'));
            $font->size(18);
            $font->color('#000');
        });

        $front->text("Nombre: {$data['name']}", 300, 160, function ($font) {
            $font->file(public_path('fonts/Arial.ttf'));
            $font->size(16);
            $font->color('#000');
        });

        $front->text("Cargo: {$data['position']}", 300, 200, function ($font) {
            $font->file(public_path('fonts/Arial.ttf'));
            $font->size(16);
            $font->color('#000');
        });

        $front->text("DUI No.: {$data['dui']}", 300, 240, function ($font) {
            $font->file(public_path('fonts/Arial.ttf'));
            $font->size(16);
            $font->color('#000');
        });

        $front->text("Vencimiento: {$data['expirationDate']}", 300, 280, function ($font) {
            $font->file(public_path('fonts/Arial.ttf'));
            $font->size(16);
            $font->color('#000');
        });

        $front->insert(Image::make($signaturePath)->resize(100, 50), 'bottom-right', 20, 20);

        $back = Image::canvas($width, $height, '#ffffff');
        $back->text('Este carnet debe portarlo en forma visible al ingreso y durante su permanencia en el BCR.', 20, 50, function ($font) {
            $font->file(public_path('fonts/Arial.ttf'));
            $font->size(14);
            $font->color('#000');
            $font->align('left');
        });

        $back->insert(Image::make($authSignaturePath)->resize(250, 100), 'bottom-right', 20, 20);

        $canvas->insert($front, 'top');
        $canvas->insert($back, 'bottom');

        $filePath = storage_path('app/public/id-card.png');
        $canvas->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
