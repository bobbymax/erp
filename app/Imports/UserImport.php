<?php

namespace App\Imports;

use App\User;
use App\GradeLevel;
use App\Group;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

use Mail;
use App\Mail\NewUser;

class UserImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $staff_id = is_string($row['staff_id']) ? (int)$row['staff_id'] : $row['staff_id'];
            $email = $row['staff_email_address'];
            $grade = trim($row['grade_level']);

            if ($email !== null) {
                $user = User::where('email', $email)->first();
                $grade_level = GradeLevel::where('code', $grade)->first();

                if (! $user && $row['staff_email_address'] !== null) {
                    $newUser = User::create([
                        'name' => $row['staff_name'],
                        'staff_no' => $staff_id,
                        'email' => $row['staff_email_address'],
                        'password' => Hash::make('Password1'),
                        'grade_level_id' => $grade_level->id,
                    ]);

                    // if ($newUser) {
                    //     $group = Group::where('label', 'staff')->first();

                    //     if ($group) {
                    //         $newUser->actAs($group);
                    //     }
                    // }

                    // Mail::to($newUser->email)->queue(new NewUser($newUser));
                }
            }
        }
        // 
        // dd($rows);
    }
}
