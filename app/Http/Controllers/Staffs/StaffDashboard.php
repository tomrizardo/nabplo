<?php

namespace App\Http\Controllers\Staffs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;
use App\Models\Participants;
use App\Models\Municipality;
use App\Models\Articles;
use App\Models\Executive;
use App\Models\Advisory;
use Storage;


use DB;

class StaffDashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');

    }

    public function Home()
    {
       
        
        return Inertia::render('Admin/AdminDashboard', [
         
        ]);
        

    }
    public function advisory()
    {
        $adv = Advisory::select('*')->orderBy('sort','ASC')->get();

     foreach ($adv as $advs) {
        if ($advs->picture_filename) {
        $filePath = storage_path('app/app/public/advisory/' . $advs->picture_filename);

        if (file_exists($filePath)) {
            $fileContent = file_get_contents($filePath);
            $advs->signature_data_uri = $fileContent;
        } else {
            $advs->signature_data_uri = null; // or provide a default image URL
        }
    }
        else {
            $advs->signature_data_uri = null; // or provide a default image URL
        }
    }
        
        return Inertia::render('Admin/Advisory', [
         'advisory'=> $adv
        ]);
        

    }

           /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function articles()
    {
        $art = Articles::select('*')->orderBy('sort','ASC')->get();
    
        foreach ($art as $arts) {
            if ($arts->picture_filename) {
                $filePath = storage_path('app/app/public/articles/' . $arts->picture_filename);
    
                if (file_exists($filePath)) {
                    $fileContent = file_get_contents($filePath);
                    $arts->signature_data_uri = $fileContent;
                } else {
                    $arts->signature_data_uri = null; // or provide a default image URL
                }
            } else {
                $arts->signature_data_uri = null; // or provide a default image URL
            }
        }
        
        return Inertia::render('Admin/Article', [
            'articles' => $art
        ]);
    }

               /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function executive()
    {
        $exec = Executive::select('*')->orderBy('sort','ASC')->get();

        foreach ($exec as $execs) {
            if ($execs->picture_filename) {
                $filePath = storage_path('app/app/public/profile/' . $execs->picture_filename);
    
                if (file_exists($filePath)) {
                    $fileContent = file_get_contents($filePath);
                    $execs->signature_data_uri = $fileContent;
                } else {
                    $execs->signature_data_uri = null; // or provide a default image URL
                }
            } else {
                $execs->signature_data_uri = null; // or provide a default image URL
            }
        }
        // $recent_app_listing = Municipality::select('name')->get()->pluck('name');
        return Inertia::render('Admin/Executive',[
        
            'executive'=>    $exec
               
        ]);
    
    }


           /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function saveArticles(Request $request)
    {
        $regx_alpha = '/^[a-zA-Z .ñÑ]+$/';
    
        $request->validate([
      
            'url' => 'required|max:160',
            'title' => 'required|max:160',
            'desc' => 'required|max:500',
            'isActive' => 'int',
            'sort' => 'int',
            'picture_filename'=> 'required',
        ], [
            'url.required' => 'The URL field is required.',
            'url.max' => 'The URL field must not exceed 160 characters.',
            'title.required' => 'The title field is required.',
            'title.max' => 'The title field must not exceed 160 characters.',
            'desc.required' => 'The description field is required.',
            'desc.max' => 'The description field must not exceed 500 characters.',
           
            'sort.int' => 'The sort field must be an integer.',
            'picture_filename.required' => 'The picture filename field is required.',
        ]);
    
        $id = $request->input('id');
    
        if ($id) {
            // Existing executive
            $articles = Articles::findOrFail($id);
        } else {
            // New executive
            $articles = new Articles();
        }
    


        $articles->sort = $request->input('sort');
        $articles->title = $request->input('title');
        $articles->url = $request->input('url');
        $articles->isActive = $request->input('isActive');
        $articles->desc = $request->input('desc');
   
        if ($request->hasFile('picture_filename')) {
            $path = $request->file('picture_filename')->store('app/public/articles');
    
            if ($id && $articles->picture_filename) {
                // Delete the previous picture file if it exists
                Storage::delete('app/app/public/articles/' . $articles->picture_filename);
            }
    
            $articles->picture_filename = basename($path);
        }
        $articles->save();
    
        $updatedArticles = Articles::find($articles->id);
    
        $filePath = storage_path('app/app/public/articles/' . $updatedArticles->picture_filename);
    
        if (file_exists($filePath)) {
            $fileContent = file_get_contents($filePath);
            $updatedArticles->signature_data_uri = $fileContent;
        } else {
            $updatedArticles->signature_data_uri = null; // or provide a default image URL
        }
    
        return response()->json([
            'message' => $id ? 'Article updated successfully' : 'Article added successfully',
            'articles' => $updatedArticles
        ]);
    
    
    }
    public function saveExec(Request $request)
    {
        $regx_alpha = '/^[a-zA-Z .ñÑ]+$/';
    
        $request->validate([
            'first_name' => 'required|max:160|regex:'.$regx_alpha,
            'last_name' => 'required|max:160',
            'mid_name' => 'max:160',
            'position' => 'required|max:160',
            'prefix' => 'max:160',
            'sort' => 'int',
           
            'picture_filename'=> 'required',
        ], []);
    
        $id = $request->input('id');
    
        if ($id) {
            // Existing executive
            $executive = Executive::findOrFail($id);
        } else {
            // New executive
            $executive = new Executive();
        }
    
        $executive->first_name = $request->input('first_name');
        $executive->last_name = $request->input('last_name');
        $executive->mid_name = $request->input('mid_name')?? '';
        $executive->position = $request->input('position');
        $executive->sort = $request->input('sort');
        $executive->prefix = $request->input('prefix')?? '';
    
        if ($request->hasFile('picture_filename')) {
            $path = $request->file('picture_filename')->store('app/public/profile');
    
            if ($id && $executive->picture_filename) {
                // Delete the previous picture file if it exists
                Storage::delete('app/app/public/profile/' . $executive->picture_filename);
            }
    
            $executive->picture_filename = basename($path);
        }
        $executive->save();
    
        $updatedExecutive = Executive::find($executive->id);
    
        $filePath = storage_path('app/app/public/profile/' . $updatedExecutive->picture_filename);
    
        if (file_exists($filePath)) {
            $fileContent = file_get_contents($filePath);
            $updatedExecutive->signature_data_uri = $fileContent;
        } else {
            $updatedExecutive->signature_data_uri = null; // or provide a default image URL
        }
    
        return response()->json([
            'message' => $id ? 'Executive updated successfully' : 'Executive added successfully',
            'executive' => $updatedExecutive
        ]);
    }
    
    public function saveAdv(Request $request)
    {
        $regx_alpha = '/^[a-zA-Z .ñÑ]+$/';
    
        $request->validate([
      
            'header' => 'required|max:160',
            'sort' => 'int',
            'picture_filename'=> 'required',
        ], []);
    
        $id = $request->input('id');
    
        if ($id) {
            // Existing executive
            $executive = Advisory::findOrFail($id);
        } else {
            // New executive
            $executive = new Advisory();
        }
    


        $executive->sort = $request->input('sort');
        $executive->header = $request->input('header');
    
        if ($request->hasFile('picture_filename')) {
            $path = $request->file('picture_filename')->store('app/public/advisory');
    
            if ($id && $executive->picture_filename) {
                // Delete the previous picture file if it exists
                Storage::delete('app/app/public/advisory/' . $executive->picture_filename);
            }
    
            $executive->picture_filename = basename($path);
        }
        $executive->save();
    
        $updatedExecutive = Advisory::find($executive->id);
    
        $filePath = storage_path('app/app/public/advisory/' . $updatedExecutive->picture_filename);
    
        if (file_exists($filePath)) {
            $fileContent = file_get_contents($filePath);
            $updatedExecutive->signature_data_uri = $fileContent;
        } else {
            $updatedExecutive->signature_data_uri = null; // or provide a default image URL
        }
    
        return response()->json([
            'message' => $id ? 'Advisory updated successfully' : 'Advisory added successfully',
            'advisory' => $updatedExecutive
        ]);
    }
    
    // public function saveExec(Request $request)
    // {
    //     $regx_alpha = '/^[a-zA-Z .ñÑ]+$/';
    
    //     $request->validate([
    //         'first_name' => 'required|max:160|regex:'.$regx_alpha,
    //         'last_name' => 'required|max:160|regex:'.$regx_alpha,
    //         'mid_name' => 'nullable|max:160|regex:'.$regx_alpha,
    //         'position' => 'required|max:160',
    //         'picture_filename'=> 'required',
    //     ], []);
    
    //     $id = $request->input('id');
    
    //     if ($id) {
    //         // Existing executive
    //         $executive = Executive::findOrFail($id);
    //     } else {
    //         // New executive
    //         $executive = new Executive();
    //     }
    
    //     $executive->first_name = $request->input('first_name');
    //     $executive->last_name = $request->input('last_name');
    //     $executive->mid_name = $request->input('mid_name');
    //     $executive->position = $request->input('position');
    
    //     if ($request->hasFile('picture_filename')) {
    //         $path = $request->file('picture_filename')->store('app/public/profile');
    //         $executive->picture_filename = basename($path);
    //     }
    
    //     $executive->save();

    //     $updatedExecutive = Executive::find($executive->id);

    //     $filePath = storage_path('app/app/public/profile/' . $updatedExecutive->picture_filename);
    
    //     if (file_exists($filePath)) {
    //         $fileContent = file_get_contents($filePath);
    //         $updatedExecutive->signature_data_uri = $fileContent;
    //     } else {
    //         $updatedExecutive->signature_data_uri = null; // or provide a default image URL
    //     }
    
    //     return response()->json([
    //         'message' => $id ? 'Executive updated successfully' : 'Executive added successfully',
    //         'executive'=>$updatedExecutive
    //     ]);
    // }
    
    

    public function deleteArticles($id)
    {
        $user = Articles::findOrFail($id);
        
        $filePath = storage_path('app/app/public/articles/' . $user->picture_filename);
    
        // Delete the file if it exists
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    ;
        $user->delete();
        return response()->json([
            'message' => 'Article deleted successfully'
        ]);
    }


    
    public function deleteExecutive($id)
    {
        $executive = Executive::findOrFail($id);

        // Get the file path
        $filePath = storage_path('app/app/public/profile/' . $executive->picture_filename);
    
        // Delete the file if it exists
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    
        // Delete the executive record
        $executive->delete();
        return response()->json([
            'message' => 'Executive deleted successfully'
        ]);
    }

    
    public function deleteAdv($id)
    {
        $executive = Advisory::findOrFail($id);

        // Get the file path
        $filePath = storage_path('app/app/public/advisory/' . $executive->picture_filename);
    
        // Delete the file if it exists
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    
        // Delete the executive record
        $executive->delete();
        return response()->json([
            'message' => 'Executive deleted successfully'
        ]);
    }


        /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function settings()
    {
        $alluser = User::where('verification', 0)->get();
        // $recent_app_listing = Municipality::select('name')->get()->pluck('name');
        return Inertia::render('Admin/Verification',[
        
            'users'=>    $alluser
               
        ]);
    
    }

                    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function RoleChange(Request $req)
    {
      
        $update_info['verification']=$req['verification'];
        

     
        $save_bene = User::where(['id'=>$req->id])->update($update_info);
        $message = 'Roles Change Successfuly';
        return response()->json([
          
            
            'message'=>$message
        ]);
      
      
    }
}
