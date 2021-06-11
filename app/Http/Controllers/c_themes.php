<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Image;
use File;
use App\themes;

class c_themes extends Controller
{
    public function getlist()
    {
        $logo = themes::where('note','logo')->orderBy('id','desc')->get();
        $slider = themes::where('note','slider')->orderBy('id','desc')->get();
        $title = themes::where('note','title')->orderBy('id','desc')->get();
        $banner = themes::where('note','banner')->orderBy('id','desc')->get();
    	return view('admin.themes.list',[
            'logo'=>$logo,
            'slider'=>$slider,
            'title'=>$title,
            'banner'=>$banner,
		]);
    }

    public function getadd($id)
    {
        $themes = new themes;
        $themes->note = $id;
        $themes->save();

        return redirect('admin/themes/list')->with('Alerts','Thành công');
    }

    public function postedit(Request $Request)
    {
        if (isset($Request->id)) {
            foreach ($Request->id as $key => $id) {
                $themes = themes::find($id);
                $themes->name = $Request->name[$key];
                $themes->content = $Request->content[$key];
                if (isset($Request->file('img')[$key])) {
                    if(File::exists('data/themes/'.$themes->img)) { File::delete('data/themes/'.$themes->img); } // xóa
                    $file = $Request->file('img')[$key]; 
                    $filename = $file->getClientOriginalName();
                    while(file_exists("data/themes/".$filename)){ $filename = str_random(4)."_".$filename; }
                    $file->move('data/themes', $filename);
                    $themes->img = $filename;
                }
                $themes->save();
            }
        }
        return redirect('admin/themes/list')->with('Alerts','Thành công');
    }

    public function getdelete($id)
    {
        $themes = themes::find($id);
        // xóa ảnh
        if(File::exists('data/themes/'.$themes->img)) {
            File::delete('data/themes/'.$themes->img);
        }
        // xóa ảnh
        $themes->delete();
        return redirect('admin/themes/list')->with('Alerts','Thành công');
    }
}
