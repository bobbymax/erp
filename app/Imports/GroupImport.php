<?php

namespace App\Imports;

use App\Group;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class GroupImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {

        // dd($rows);

        foreach ($rows as $row) {
            $code = $row['code'];
            $parent_code = $row['parent'] === "NONE" ? 0 : $row['parent'];

            $exists = Group::where('code', $code)->first();
            $parent = Group::where('code', $parent_code)->first();

            if (! $exists) {
                Group::create([
                    'name' => $row['name'],
                    'label' => slugify($row['name']),
                    'code' => $row['code'],
                    'parent' => $parent ? $parent->id : 0,
                    'directorate' => $row['type'] == "DIRECTORATE" ? 1 : 0,
                    'division' => $row['type'] == "DIVISION" ? 1 : 0,
                    'department' => $row['type'] == "DEPARTMENT" ? 1 : 0,
                ]);
            }
        }

        return true;
    }

    //  private function createGroup()
}
