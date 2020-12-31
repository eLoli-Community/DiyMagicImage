<?php

namespace App\Http\Controllers;

use App\Contracts\ShowMagicImage;
use App\Models\MagicImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagicImageController extends Controller
{

    public function index()
    {
        return view('magic-images.list')->with('magic_images',Auth::user()->currentTeam->magic_images()->paginate());
    }

    public function create()
    {
        return view('magic-images.create');
    }

    public function show($id,ShowMagicImage $shower,Request $request)
    {
        $magicImage = MagicImage::findOrFail($id);
        $image=$shower->make($magicImage->script,$request->all());
        if(in_array('text/html',$request->getAcceptableContentTypes())){
            return view('magic-images.show')
                ->with('magicImage',$magicImage)
                ->with('imageUrl','data:image/png;base64,'.base64_encode($image))
                ->with('imageOutput',$shower->getOutputString());
        }else{
            return response($image)
                ->withHeaders(['Content-Type' => 'image/png']);

        }
    }

    public function update($id)
    {
        $magicImage = MagicImage::findOrFail($id);
        return view('magic-images.update')->with('magicImage',$magicImage);
    }

    public function destroy(MagicImage $magicImage)
    {
        //
    }
}
