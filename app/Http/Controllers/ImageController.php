<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Image;
use Faker\Factory as Faker;

class ImageController extends Controller
{
    public function index(Request $request)
	{
        $image = Image::all();
        $view = View::make('renderSections')->with('images',$image);
        if($request->ajax()){
            //Aqui se hace el RenderSections, esto si y solo si la solicitud es de tipo ajax
            $sections = $view->renderSections();

            return Response::json($sections['contentPanel']); // se envie el sections con un formato json

        }else return $view;
	}

	public function store()
	{
        $faker = Faker::create();
        $image = new Image;
        $image->imagesUrl = $faker->imageUrl($width = 171, $height = 180, 'cats');

        if($image->save())
            return Response::json('ok',200);
        else
            return Response::json('error',500);
	}
}
