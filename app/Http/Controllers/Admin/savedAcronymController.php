<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\savedAcronym;
use Illuminate\Http\Request;
use Image;
use File;

class savedAcronymController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('savedacronym','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $savedacronym = savedAcronym::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('term', 'LIKE', "%$keyword%")
                ->orWhere('definition', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->orWhere('is_approved', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $savedacronym = savedAcronym::paginate($perPage);
            }

            return view('SavedAcronym.saved-acronym.index', compact('savedacronym'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('savedacronym','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('SavedAcronym.saved-acronym.create');
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('savedacronym','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'user_id' => 'required',
			'term' => 'required',
			'definition' => 'required',
			'category' => 'required'
		]);

            $savedacronym = new savedAcronym($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $savedacronym_path = 'uploads/savedacronyms/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($savedacronym_path) . DIRECTORY_SEPARATOR. $profileImage);

                $savedacronym->image = $savedacronym_path.$profileImage;
            }
            
            $savedacronym->save();
            return redirect()->back()->with('message', 'savedAcronym added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('savedacronym','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $savedacronym = savedAcronym::findOrFail($id);
            return view('SavedAcronym.saved-acronym.show', compact('savedacronym'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('savedacronym','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $savedacronym = savedAcronym::findOrFail($id);
            return view('SavedAcronym.saved-acronym.edit', compact('savedacronym'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('savedacronym','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'user_id' => 'required',
			'term' => 'required',
			'definition' => 'required',
			'category' => 'required'
		]);
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $savedacronym = savedAcronym::where('id', $id)->first();
            $image_path = public_path($savedacronym->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/savedacronyms/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/savedacronyms/'.$fileNameToStore;               
        }


            $savedacronym = savedAcronym::findOrFail($id);
            $savedacronym->update($requestData);
            return redirect()->back()->with('message', 'savedAcronym updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('savedacronym','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            savedAcronym::destroy($id);
            return redirect()->back()->with('message', 'savedAcronym deleted!');
        }
        return response(view('403'), 403);

    }

    public function approveAcronym (Request $request, $id)
    {
        if ($saved_acronym = savedAcronym::find($id)) {
            $saved_acronym->is_approved = 1;
            $saved_acronym->save();
        }

        return redirect()->back()->with('success', 'Approved successfully!');
    }
}
