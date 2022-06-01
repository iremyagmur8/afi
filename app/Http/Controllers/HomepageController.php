<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\category;
use App\Models\contact;
use App\Models\homepage;
use App\Models\post;
use App\Models\product;
use App\Models\videogallery;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Facades\Config;


class HomepageController extends Controller
{

    public function cloudflareImage()
    {
        $token = "DhLGwokORgoCqPQBp854PD4ILsNlaVGDi7FhqR1e";
    }

    public function index()
    {
        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->subcategory = category::where("parent_id", 5)->orderby('sort')->get();
        $cData->about = category::where("id", 4)->first();
        $cData->custom = post::where('category_id', 26)->get();
        $cData->references = post::where('category_id', 8)->orderby('sort')->get();

        //if ($this->ismobile())  return view('home.mobil-index', ['cData' => $cData]);
        return view('home.index', ['cData' => $cData]);
    }

    public function products(Request $request)
    {
        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->category = category::where("id", $request->id)->first();
        $cData->posts = post::where("category_id", $request->id)->get();

        return view('home.products', ['cData' => $cData]);
    }
    public function productDetail(Request $request)
    {
        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->category = category::where("id", $request->id)->first();
        $cData->posts = post::where("category_id", $request->id)->get();
        $cData->products = post::where("category_id", 5)->first();

        return view('home.productDetail', ['cData' => $cData]);
    }
    public function about(Request $request)
    {
        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->category = category::where("id", $request->id)->first();
        $cData->posts = post::where("category_id", $request->id)->get();
        return view('home.about', ['cData' => $cData]);
    }

    public function certificates(Request $request)
    {
        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->posts = post::where("category_id", 6)->orderBy('sort')->get();
        return view('home.certificates', ['cData' => $cData]);
    }

    public function references(Request $request)
    {
        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->posts = post::where("category_id", 8)->orderBy('sort')->get();
        return view('home.references', ['cData' => $cData]);
    }

    public function contact(Request $request)
    {
        $cData = new \ArrayObject();
        return view('home.contact', ['cData' => $cData]);
    }

    public function technical(Request $request)
    {
        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->posts = post::where("category_id", $request->id)->where('publish_time', "<", date("Y-m-d H:i:s"))->orderBy('publish_time')->get();
        return view('home.technical', ['cData' => $cData]);
    }

    public function category(Request $request)
    {

        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->category = category::where("id", $request->category_id)->first();
        $cData->posts = post::where("category_id", $request->id)->where('publish_time', "<", date("Y-m-d H:i:s"))->orderBy('publish_time')->get();
        if (count($cData->posts) == 1) {
            $cData->posts = $cData->posts->first();
            $cData->preview = post::where("id", "<", $cData->posts->id)->where('publish_time', "<", date("Y-m-d H:i:s"))->orderByDesc('publish_time')->first();
            $cData->next = post::where("id", ">", $cData->posts->id)->where('publish_time', "<", date("Y-m-d H:i:s"))->orderByDesc('publish_time')->first();
            $cData->brands = post::where("brand", $cData->posts->brand)->where("id", "!=", $cData->posts->id)->where('publish_time', "<", date("Y-m-d H:i:s"))->orderByDesc('publish_time')->limit(20)->get();
            $cData->posts->increment('hit');
            // if ($this->ismobile()) return view('home.mobil-post', ['cData' => $cData]);
            return view('home.post', ['cData' => $cData]);
        } elseif (count($cData->posts) > 1) {
            // if ($this->ismobile()) return view('home.mobil-category', ['cData' => $cData]);
            return view('home.category', ['cData' => $cData]);
        } else redirect("/");
    }

    public
    function categories(Request $request)
    {
        $cData = new \ArrayObject();
        $cData->category = category::where("id", $request->id)->first();
        $cData->posts = post::where("category_id", $request->id)->where('publish_time', "<", date("Y-m-d H:i:s"))->orderByDesc('publish_time')->get();
        if (count($cData->posts) == 1) {
            $cData->posts = $cData->posts->first();
            //  if ($this->ismobile()) return view('home.mobil-post', ['cData' => $cData]);

            return view('home.post', ['cData' => $cData]);
        } elseif (count($cData->posts) > 1) {
            //   if ($this->ismobile()) return view('home.mobil-category', ['cData' => $cData]);
            return view('home.category', ['cData' => $cData]);
        }
    }

    public function post(Request $request)
    {

        $cData = new \ArrayObject();
        $banners = banner::orderBy('place')->orderBy('sort')->get();
        foreach ($banners as $key => $val) {
            $cData->place[$val->place][] = $val;
        }
        $cData->posts = post::where("category_id", $request->id)->where('publish_time', "<", date("Y-m-d H:i:s"))->first();
        // if ($this->ismobile())  return view('home.mobil-post', ['cData' => $cData,"amp"=>Config::get("solaris.site.url").str_slug($cData->posts->title,"-")."/".$cData->posts->id."/amp"]);

        return view('home.post', ['cData' => $cData]);
    }


}
