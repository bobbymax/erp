<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PDF;

class PdfController extends Controller
{
    public function trainings(User $user)
    {
    	//dd($user);
    	$pdf = PDF::loadView('pages.pdf-templates.trainings', compact('user'));
		return $pdf->download($user->name . ' Trainings.pdf');
    }
}
