<?php

namespace App\Http\Controllers\Admin\Staffs\Status;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponseAjax;

class UpdateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Update Controller.
    *
    * @return \Illuminate\Http\Response
    */
    public function updateForm($id)
    {
        $staff_status = DB::table('staff_status')->where('id', $id)->first();

        return view('admin.staffs.status.update', ['staff_status' => $staff_status]);
    }

    /**
    * Update Controller.
    *
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, $id)
    {

        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $_token             = $data['_token'];
        $name               = $data['name'];
        $status             = $data['status'];


        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        if (strlen($name) < 3 || strlen($name) > 255) {
            ResponseAjax::set('Message.text', 'Name between 3 to 255 characters');
            $ErrorCount++;
        }

        /*
         * End : Incoming data check
         * */

        /*
         * Start : Student existence check in database
         * */

        if($ErrorCount == 0)
        {

            $designations = DB::table('staff_status')->where('id', $id)->first();
            if ($designations = null)
            {
                ResponseAjax::set('Message.text', 'Status not exist');
                $ErrorCount++;
            }
        }

        /*
         * End : Student existence check in database
         * */


        /*
         * Start : insert in database
         * */
        if($ErrorCount == 0)
        {
            DB::table('staff_status')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'status' => $status,
                    'updated_at' => DB::raw('NOW()')
                ]);

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('Message.text', "Successfully Status Updated");
        }
        /*
         * End : insert in database
         * */

        ResponseAjax::Response();
    }
}
