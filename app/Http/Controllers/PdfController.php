<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Training;
use App\TrainingObjective;
use App\GradeGroup;
use DB;
use PDF;

class PdfController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * [trainings description]
	 * @param  User   $user [description]
	 * @return [type]       [description]
	 */
    public function trainings(User $user)
    {
    	//dd($user);
    	$pdf = PDF::loadView('pages.pdf-templates.trainings', compact('user'));
		return $pdf->download($user->name . ' Trainings.pdf');
    }


    public function instructions()
    {
    	$trainings = Training::whereHas('proposed', function ($query) {
    		$query->where('approved', 1)->where('hr_approved', 1);
    	})->get();

        // dd(json_encode($trainings));

    	return view('pages.trainings.journey-instructions', compact('trainings'));
    }

    public function joiningInstructions(Training $training)
    {
        $userGradeGroup = $training->owner->profile->grade_level;
        $gradeGroup = GradeGroup::with('allowance')->where('grades', 'like', '%' . $userGradeGroup . '%')->first();


        $db = DB::table('per_diem_allowances')->where('travel_category_id', $training->travelCategory->id)->where('grade_group_id', $gradeGroup->id)->pluck('per_diem');

        $values = ['training' => $training, 'grade_group' => $gradeGroup, 'estacode' => $db[0]];

        $editable = json_encode($values);

        return view('pages.trainings.instructions', compact('training', 'editable'));
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $trainingId = $request->training;
            $objectiveText = $request->objective;

            $training = Training::find($trainingId);

            if ($training) {
                $objective = new TrainingObjective;
                $objective->description = $objectiveText;

                $training->objectives()->save($objective);

                $message = ['data' => 'You have updated this recorded successfully.', 'status' => 'success'];
            } else {
                $message = ['data' => 'Something went terribly wrong', 'status' => 'error'];
            }

            return response()->json($message);
        }
    }
}
