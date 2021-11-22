<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Http\Services\UploaderService;
use Illuminate\Http\UploadedFile;

use Validator;

class SocialLinkController extends Controller
{
    /**
     * @var IMAGE_PATH
     */
    const IMAGE_PATH = 'social_links';
    /**
     * @var UploaderService
     */
    private $uploaderService;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(UploaderService $uploaderService)
    {
        $this->get_privilege();
        $this->uploaderService = $uploaderService;
    }

    public function index()
    {
        $social_links = SocialLink::all();
        return view('social_link.index', compact('social_links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $social_link = null;

        return view('social_link.form', compact('social_link'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required',
            'image' => ''
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $social_link = new SocialLink();
        $social_link->fill($request->except('ímage'));

        if ($social_link->image) {
            $imgExtensions = array("png", "jpeg", "jpg");
            $file = $request->image;
            if (!in_array($file->getClientOriginalExtension(), $imgExtensions)) {
                \Session::flash('failed', trans('messages.Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..'));
                return back();
            }

            $social_link->image = $this->handleFile($request['image']);
        }

        $social_link->save();
        \Session::flash('success', trans('messages.Added Successfully'));
        return redirect('/social_link');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $social_link = SocialLink::findOrFail($id);
        return view('social_link.index', compact('social_link'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $social_link = SocialLink::findOrFail($id);
        return view('social_link.form', compact('social_link'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required',
            'image' => ''
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $social_link = SocialLink::findOrFail($id);

        $social_link->fill($request->except('ímage'));

        if ($request->image) {
            $imgExtensions = array("png", "jpeg", "jpg");
            $file = $request->image;
            if (!in_array($file->getClientOriginalExtension(), $imgExtensions)) {
                \Session::flash('failed', trans('messages.Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..'));
                return back();
            }

            if ($social_link->image) {
                $this->delete_image_if_exists(base_path('/uploads/doctors/' . basename($social_link->image)));
            }

            $social_link->image = $this->handleFile($request['image']);
        }
        
        $social_link->save();

        \Session::flash('success', trans('messages.updated successfully'));
        return redirect('/social_link');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social_link = SoialLink::find($id);
        $social_link->delete();

        return redirect()->back();
    }

    /**
     * handle image file that return file path
     * @param File $file
     * @return string
     */
    public function handleFile(UploadedFile $file)
    {
        return $this->uploaderService->upload($file, self::IMAGE_PATH);
    }
}
