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
        $section = section::orderBy('id','desc')->get();
        return view('admin.section.list',[
            'section'=>$section
        ]);
    }

    public function getadd()
    {
        return view('admin.section.addedit',[
        ]);
    }

    public function postadd(Request $Request)
    {
        $this->validate($Request,['name' => 'Required'],[] );
        $section = new section;
        $section->user_id = Auth::User()->id;
        $section->name = $Request->name;
        $section->content = $Request->content;
        $section->note = $Request->note;
        // thêm ảnh
        if ($Request->hasFile('img')) {
            $file = $Request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/section/300/".$filename)){ $filename = str_random(4)."_".$filename; }
            $img = Image::make($file)->resize(1000, 800, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/section/'.$filename));
            $img = Image::make($file)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/section/300/'.$filename));
            $section->img = $filename;
        }
        // thêm ảnh
        $section->save();
        return redirect('admin/section/list')->with('Alerts','Thành công');
    }

    public function getedit($id)
    {
        $data = section::findOrFail($id);
        return view('admin.section.addedit',[
            'data'=>$data,
        ]);
    }

    public function postedit(Request $Request,$id)
    {
        $this->validate($Request,['name' => 'Required'],[] ); 
        $section = section::find($id);    
        $section->user_id = Auth::User()->id;
        $section->name = $Request->name;
        $section->content = $Request->content;
        $section->note = $Request->note;
        if ($Request->hasFile('img')) {
            // xóa ảnh cũ
            if(File::exists('data/section/'.$section->img)) { 
                File::delete('data/section/'.$section->img); 
                File::delete('data/section/300/'.$section->img); 
            }
            // xóa ảnh cũ
            // thêm ảnh mới
            $file = $Request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/section/300/".$filename)){ $filename = str_random(4)."_".$filename; }
            $img = Image::make($file)->resize(1000, 800, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/section/'.$filename));
            $img = Image::make($file)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/section/300/'.$filename));
            $section->img = $filename;
            // thêm ảnh mới
        }
        $section->save();
        return redirect('admin/section/edit/'.$id)->with('Alerts','Thành công');
    }

    public function getdelete($id)
    {
        $section = section::find($id);
        // xóa ảnh
        if(File::exists('data/section/'.$section->img)) {
            File::delete('data/section/'.$section->img);
            File::delete('data/section/300/'.$section->img);
        }
        // xóa ảnh
        $section->delete();
        return redirect('admin/section/list')->with('Alerts','Thành công');
    }
}
