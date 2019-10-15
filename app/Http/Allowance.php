<?php

namespace App\Http;

use App\Training;
use App\GradeGroup;
use DB;


class Allowance
{

	public $training;

	public function getData($training)
	{
		return json_encode($this->getValues($training));
	}

	protected function getValues($training)
	{
		$userGradeGroup = $training->owner->profile->grade_level;
        $gradeGroup = GradeGroup::with('allowance')->where('grades', 'like', '%' . $userGradeGroup . '%')->first();


        $db = DB::table('per_diem_allowances')->where('travel_category_id', $training->travelCategory->id)->where('grade_group_id', $gradeGroup->id)->pluck('per_diem');

        return $values = ['training' => $training, 'grade_group' => $gradeGroup, 'estacode' => $db[0]];
	}
}