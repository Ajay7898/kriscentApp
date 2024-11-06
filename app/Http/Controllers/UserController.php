<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\{Consultation,User};
use App\Events\SendNotification;

class UserController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with('user_consult')->with('profession')
        ->where('user_id', Auth::id())
        ->get(); 

        return view('user.dashboard',compact('consultations'));
    }

    public function create()
    {
        $users = User::where('role_id',2)->get();
        return view('user.create',compact('users'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'consultation_id' => 'required',
            'notes' => 'nullable|string',
            'appointment_date' => 'required|date',
        ]);

        $profession_id = User::where('id', $request->consultation_id)->select('profession_id')->first()->profession_id;
    
        Consultation::create([
            'user_id' => Auth::user()->id,
            'consultation_id' => $request->consultation_id,
            'profession_id' => $profession_id,
            'notes' => $request->notes,
            'appointment_date' => $request->appointment_date,
        ]);
    
        return redirect()->route('home.user')->with('success', 'Consultation created successfully.');
    }

    public function edit($id)
    {
        $users = User::where('role_id',2)->get();
        $consultation = Consultation::with('user_consult')->find($id);
        
        return view('user.edit', compact('consultation','users'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'consultation_id' => 'required',
            'notes' => 'nullable|string',
            'appointment_date' => 'required|date',
        ]);

        $profession_id = User::where('id', $request->consultation_id)->select('profession_id')->first()->profession_id;

        $consultation = Consultation::findOrFail($id);
    
        $consultation->update([
            'user_id' => Auth::user()->id,
            'consultation_id' => $request->consultation_id,
            'profession_id' => $profession_id,
            'notes' => $request->notes,
            'appointment_date' => $request->appointment_date,
        ]);
    
        return redirect()->route('home.user')->with('success', 'Consultation updated successfully.');
    }

    public function destroy($id)
    {
        $consultation = Consultation::where('id',$id)->delete();
        return redirect()->route('home.user')->with('success', 'Consultation deleted successfully.');
    }

    public function userProfileUpdate(Request $request)
    {
        $userid = Auth::user()->id;
        $user = User::find($userid);
    
        if($request->hasFile('image'))
        {
            $path = 'uploads/user'; 
            $imageName = time().'-'.$request->image->getClientOriginalName();
            $request->image->move(public_path($path),$imageName);
            $user->image = $path . '/' . $imageName;
        }

        $user->name = $request->name;

        $user->update();
        return redirect()->route('user.profile.show')->with('success', 'Profile updated successfully!');
    }

    public function userProfile()
    {
        $user = Auth::user();

        return view('user.profile',compact('user'));
    }

    public function userNotificationCreate()
    {
        return view('user.notification');
    }

    public function sendNotification(Request $request)
    {
       
        try 
        {
            event(new SendNotification($request->message, auth()->user()->id));

            return response()->json(['success'=>true,'msg'=>'Notification Added']);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }
}
