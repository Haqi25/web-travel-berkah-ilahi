<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class changeScheduleStatus extends Controller
{
    
        public function activeStatus($id){

        $schedule = Schedule::findOrfail($id);

        $schedule->status = 'ACTIVE';

        $schedule->save();

        return redirect()->route('scheduleList.index')->with('success', 'Status jadwal berhasil diubah');
    }

    public function nonactiveStatus($id){
        $schedule = Schedule::findOrfail($id);

        $schedule->status = 'NONACTIVE';

        $schedule->save();

        return redirect()->route('scheduleList.index')->with('success', 'Status jadwal berhasil diubah');
    }
}
