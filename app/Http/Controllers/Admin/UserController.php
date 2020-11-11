    <?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Task;
use App\Mood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Boolean;
use Auth;
use Image;
use Redirect;
use File;

class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('admin.users.index')
            ->with('users', $users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        	'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            
	    ]);
        //dd($request);
	    $user = new user([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'education' => $request->get('education'),
            'class' => $request->get('class'),
            'mentor' => $request->get('mentor'),
	        'email'=> $request->get('email'),
            'password'=> bcrypt($request->get('password')),


            'pluscoach_id' => $request->get('plus'),
            'is_pluscoach' => $request->get('is_pluscoach'),
	    ]);

        $user->save();

	    return redirect(route('users.index'))->with('success', 'user has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $tasks = Task::get();
        $moods = Mood::all();

        return view('admin.users.show')
        	->with('user', $user)
            ->with('moods', $moods)
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit')
        		->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        	'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
	    ]);

	    $user = User::find($id);
	    $user->name = $request->get('name');
	    $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->admin = ($request->admin) ? 0 : 1;
	    $user->save();

	    return redirect(route('users.index'))->with('success', 'Status has been updated');
    }

    // public function updateProfilePicture(Request $request, $id) 
    // {
    //     $user = User::find(Auth::user()->id);
    //     if ($request->hasFile('profilepicture')) {
    //         $profilepicture = $request->file('profilepicture');
    //         $filename = time() . '.' . $profilepicture->getClientOriginalExtension();

    //         if ($user->profilepicture !== 'default.png') {
    //             $file = 'profilepicture/' . $user->p rofilepicture;

    //             if (File::exists($file)) {
                     
    //                  unlink($file);

                    
    //             }

    //         }
    //         Image::make($profilepicture)->fit(300, 300)->save('profilepicture/' . $filename); 
    //         $user = Auth::user(); 
    //         $user->profilepicture = $filename; 
    //         $user->save();

            
    //         }
    //         return Redirect::back();
    // }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        // $image_path = 'profilepicture/'.$user->profilepicture;

        // File::delete($image_path);
     	$user->delete();

     	return redirect(route('users.index'))->with('success', 'user has been deleted Successfully');
    }

    public function addTask(Request $request, $id)
    {
        $user = User::find($id);
        $user->tasks()->attach($request->get('tasks'));

        return redirect(route('users.show', $id))->with('success', 'Task has been added successfully');
    }

}
