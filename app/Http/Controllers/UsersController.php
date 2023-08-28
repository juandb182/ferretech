<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;

use App\Models\User;


class UsersController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        
        $users = DB::table("users")->paginate(10);
        return view('users.indexUsers',compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view("users.createUser");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    public function store(Request $request)

    {
        

        $validated = $request->validate([
            'name' => 'required| string| max:255',
            'email' => 'required| string| email| max:255| unique:users',
            'password' => $this->passwordRules(),
            'userType' => 'required',
          
        ]);


      

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'userType' => $validated['userType'],
        ]);

        $user->save();

        return redirect()->route('users.index')->with('success','Usuario ha sido creado correctamente');  
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        
        return view("users.editUser",compact("user"));
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
        //


       $user = User::findOrFail($id);
   
       $data = $request->only('name', 'email', 'userType');
       $password=$request->input('password');

       $confirm_password = $request->input("password_confirmation");


       if ($password != $confirm_password ) {
        return redirect()->route('users.index')->with('danger','La contraseña y la confirmacion no concuerdan.');
       }


       
       if($password)
           $data['password'] = bcrypt($password);
        if(trim($request->password)=='')
        {
           $data=$request->except('password');
        }
        else{
            $data=$request->all();
           $data['password']=bcrypt($request->password);
        }

       $user->update($data);

       

        return redirect()->route('users.index')->with('success','Usuario Actualizado correctamente');  


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success','Usuario Eliminado con exito.');  
    }


    public function search(Request $request)
    {
        $search_text = $request->query('query');

        /*   
        dd($search_text,$search_order); */



        //boton asc y desc para el codigo

        if ($search_text == " " || $search_text == null || $search_text == "null") {
            return redirect('/users');
        }



        

        $users = DB::table('users')->where('name', 'LIKE', "%" . $search_text . "%")
            ->orderBy('name', 'ASC')
            ->paginate(100000);
        return view('users.indexUsers', compact('users'));
    }

    protected function passwordRules()
    {
        return ['required', 'string', new Password, 'confirmed'];
    }

    protected function passwordRulesUpdate()
    {
        return ['string', new Password, 'confirmed'];
    }
}
