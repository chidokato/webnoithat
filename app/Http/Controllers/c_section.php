<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Image;
use File;
use App\seo;
use App\section;
use App\category;
use App\images;

class c_section extends Controller
{
    public function getlist()
    {
        $section = section::where('sort_by',2)->orderBy('id','desc')->get();
        return view('admin.section.list',[
            'section'=>$section
        ]);
    }

    public function getadd()
    {
        $category = category::where('sort_by',2)->orderBy('id','desc')->get();
        return view('admin.section.addedit',[
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

        $section = new section;
        $section->user_id = Auth::User()->id;
        $section->category_id = $Request->cat_id;
        $section->seo_id = $seo->id;
        $section->sort_by = '2';
        $section->sku = str_random(8);
        $section->name = $Request->name;
        $section->slug = changeTitle($Request->name);
        $section->detail = $Request->detail;
        $section->content = $Request->content;
        $section->hits = '50';
        $section->status = 'true';
        // thêm ảnh
        if ($Request->hasFile('img')) {
            $file = $Request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/section/300/".$filename)){ $filename = str_random(4)."_".$filename; }
            $img = Image::make($file)->resize(1000, 800, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/section/'.$filename));
            $img = Image::make($file)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/section/300/'.$filename));
            $img = Image::make($file)->resize(80, 80, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/section/80/'.$filename));
            $section->img = $filename;
        }
        // thêm ảnh
        $section->save();
        return redirect('admin/section/list')->with('Alerts','Thành công');
    }

    public function getedit($id)
    {
        $data = section::findOrFail($id);
        $seo = seo::findOrFail($data['seo_id']);
        $category = category::where('sort_by',2)->orderBy('id','desc')->get();
        return view('admin.section.addedit',[
            'data'=>$data,
            'category'=>$category,
            'seo'=>$seo,
        ]);
    }

    public function postedit(Request $Request,$id)
    {
        $this->validate($Request,['name' => 'Required'],[] );     
        $section = section::find($id);
        $section->name = $Request->name;
        $section->slug = $Request->slug;
        $section->detail = $Request->detail;
        $section->content = $Request->content;
        $section->category_id = $Request->cat_id;
        if ($Request->hasFile('img')) {
            // xóa ảnh cũ
            if(File::exists('data/section/'.$section->img)) { 
                File::delete('data/section/'.$section->img); 
                File::delete('data/section/300/'.$section->img); 
                File::delete('data/section/80/'.$section->img); 
            }
            // xóa ảnh cũ
            // thêm ảnh mới
            $file = $Request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/section/300/".$filename)){ $filename = str_random(4)."_".$filename; }
            $img = Image::make($file)->resize(1000, 800, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/section/'.$filename));
            $img = Image::make($file)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/section/300/'.$filename));
            $img = Image::make($file)->resize(80, 80, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/section/80/'.$filename));
            $section->img = $filename;
            // thêm ảnh mới
        }
        $section->save();
        $seo = seo::find($section->seo_id);
        $seo->title = $Request->title;
        $seo->description = $Request->description;
        $seo->keywords = $Request->keywords;
        $seo->robot = $Request->robot;
        $seo->save();
        return redirect('admin/section/edit/'.$id)->with('Alerts','Thành công');
    }

    public function getdelete($id)
    {
        $section = section::find($id);
        
        $seo = seo::find($section->seo_id);
        $seo->delete();

        // xóa ảnh
        if(File::exists('data/section/'.$section->img)) {
            File::delete('data/section/'.$section->img);
            File::delete('data/section/300/'.$section->img);
            File::delete('data/section/80/'.$section->img);
        }
        // xóa ảnh
        $section->delete();
        return redirect('admin/section/list')->with('Alerts','Thành công');
    }
}
