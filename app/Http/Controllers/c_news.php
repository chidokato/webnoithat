<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Image;
use File;
use App\seo;
use App\articles;
use App\category;
use App\images;

class c_news extends Controller
{
    public function getlist()
    {
        $articles = articles::where('sort_by',2)->orderBy('id','desc')->get();
        return view('admin.news.list',[
            'news'=>$articles
        ]);
    }

    public function getadd()
    {
        $category = category::where('sort_by',2)->orderBy('id','desc')->get();
        return view('admin.news.addedit',[
            'category'=>$category
        ]);
    }

    public function postadd(Request $Request)
    {
        $this->validate($Request,['name' => 'Required'],[] );
        // seo
        $seo = new seo;
        $seo->title = $Request->title;
        $seo->description = $Request->description;
        $seo->keywords = $Request->keywords;
        $seo->robot = $Request->robot;
        $seo->save();

        $articles = new articles;
        $articles->user_id = Auth::User()->id;
        $articles->category_id = $Request->cat_id;
        $articles->seo_id = $seo->id;
        $articles->sort_by = '2';
        $articles->sku = str_random(8);
        $articles->name = $Request->name;
        $articles->slug = changeTitle($Request->name);
        $articles->detail = $Request->detail;
        $articles->content = $Request->content;
        $articles->hits = '50';
        $articles->status = 'true';
        // thêm ảnh
        if ($Request->hasFile('img')) {
            $file = $Request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/news/300/".$filename)){ $filename = str_random(4)."_".$filename; }
            $img = Image::make($file)->resize(1000, 800, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/news/'.$filename));
            $img = Image::make($file)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/news/300/'.$filename));
            $img = Image::make($file)->resize(80, 80, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/news/80/'.$filename));
            $articles->img = $filename;
        }
        // thêm ảnh
        $articles->save();
        return redirect('admin/news/list')->with('Alerts','Thành công');
    }

    public function getedit($id)
    {
        $data = articles::findOrFail($id);
        $seo = seo::findOrFail($data['seo_id']);
        $category = category::where('sort_by',2)->orderBy('id','desc')->get();
        return view('admin.news.addedit',[
            'data'=>$data,
            'category'=>$category,
            'seo'=>$seo,
        ]);
    }

    public function postedit(Request $Request,$id)
    {
        $this->validate($Request,['name' => 'Required'],[] );     
        $articles = articles::find($id);
        $articles->name = $Request->name;
        $articles->slug = $Request->slug;
        $articles->detail = $Request->detail;
        $articles->content = $Request->content;
        $articles->category_id = $Request->cat_id;
        if ($Request->hasFile('img')) {
            // xóa ảnh cũ
            if(File::exists('data/news/'.$articles->img)) { 
                File::delete('data/news/'.$articles->img); 
                File::delete('data/news/300/'.$articles->img); 
                File::delete('data/news/80/'.$articles->img); 
            }
            // xóa ảnh cũ
            // thêm ảnh mới
            $file = $Request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/news/300/".$filename)){ $filename = str_random(4)."_".$filename; }
            $img = Image::make($file)->resize(1000, 800, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/news/'.$filename));
            $img = Image::make($file)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/news/300/'.$filename));
            $img = Image::make($file)->resize(80, 80, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/news/80/'.$filename));
            $articles->img = $filename;
            // thêm ảnh mới
        }
        $articles->save();
        $seo = seo::find($articles->seo_id);
        $seo->title = $Request->title;
        $seo->description = $Request->description;
        $seo->keywords = $Request->keywords;
        $seo->robot = $Request->robot;
        $seo->save();
        return redirect('admin/news/edit/'.$id)->with('Alerts','Thành công');
    }

    public function getdelete($id)
    {
        $articles = articles::find($id);
        
        $seo = seo::find($articles->seo_id);
        $seo->delete();

        // xóa ảnh
        if(File::exists('data/news/'.$articles->img)) {
            File::delete('data/news/'.$articles->img);
            File::delete('data/news/300/'.$articles->img);
            File::delete('data/news/80/'.$articles->img);
        }
        // xóa ảnh
        $articles->delete();
        return redirect('admin/news/list')->with('Alerts','Thành công');
    }
}
