<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
// use App\Http\Controllers\Redirect;
use Auth;
use App\Lead;
use DB;

class LeadController extends Controller
{
    public function index()
    {
        return view('leads/addLeads');
    }
    public function insertLead(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email'=> 'required|email',
            'contact'=> 'required|numeric|min:10',
            'address'=> 'required|min:15',
            'area'=>'required'
        ]);
        if ($validator->fails()) {
            toastr()->error('Oops!! Something Went wrong..');
            return back()->withErrors($validator)->withInput();
        }else{
                $lead = new Lead();
                $lead->name = $request->name;
                $lead->email = $request->email;
                $lead->contact = $request->contact;
                $lead->address = $request->address;
                $lead->area = $request->area;
                $lead->save();
            toastr()->success('Data has been saved successfully!');
            return back();
        }
    }
    public function getLead()
    {
        $user = Auth::user();
        $leads = DB::table('leads')->orderBy('id', 'desc')->paginate(10);
        return view('/leads/viewLeads',compact('leads','user'));
    }
    public function deleteLead(Request $request)
    {
        $id = $request->id;
        $lead = Lead::find($id);
        $lead->delete();
        $arr = array('success' => 'Lead has been deleted successfully!');
        echo json_encode($arr);
    }
    public function editLead(){  // Request $request
        $lead_id = $_GET['id'];
        $id = Crypt::decrypt($lead_id);
        $data = Lead::find($id);
        return view('leads/editLeads',compact('data'));
    }
    public function editLeadContents(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email'=> 'required|email',
            'contact'=> 'required|numeric|min:10',
            'address'=> 'required|min:15',
            'area'=>'required'
        ]);
        if ($validator->fails()) {
            // dd($request->id);
            toastr()->error('Oops!! Something Went wrong..');
            return \Redirect::route('editLead', ['id' => Crypt::encrypt($request->id)])->withErrors($validator);
        }else{
            $lead = Lead::find($request->id);
            $lead->name = $request->name;
            $lead->email = $request->email;
            $lead->contact = $request->contact;
            $lead->address = $request->address;
            $lead->area = $request->area;
            $lead->save();
            toastr()->success('Leads has been updated successfully!');
            return view('/leads/addLeads');
        }
        
    }
}
