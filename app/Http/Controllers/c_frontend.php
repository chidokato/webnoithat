<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\themes;
use App\category;
use App\setting;
use App\articles;
use App\home;
use App\slider;
use App\images;
use App\district;
use App\mausac;
use App\size;
use Mail;

class c_frontend extends Controller
{
    function __construct()
    {
        $head_logo = themes::where('id',1)->first();
        $bannherhomes = themes::where('note',2)->first();
        $head_logo_trang = themes::where('id',2)->first();
        $slider = themes::where('note',1)->get();
        $head_setting = setting::where('id',1)->first();
        $menu_top = category::wherein('sort_by',[1,2,3])->where('status','true')->where('parent', 0)->orderBy('view','asc')->get();
        $mausac = mausac::all();
        $size = size::orderBy('name','asc')->get();

        view()->share( [
            'head_logo'=>$head_logo,
            'bannherhomes'=>$bannherhomes,
            'head_logo_trang'=>$head_logo_trang,
            'slider'=>$slider,
            'head_setting'=>$head_setting,
            'menu_top'=>$menu_top,
            'mausac'=>$mausac,
            'size'=>$size,
        ]);
    }

    public function home()
    {
        $articles = articles::orderBy('id','desc')->paginate(30);
        return view('pages.home',[
            'articles' => $articles,
        ]);
    }

    public function sitemap()
    {
        $sitemap_category = category::where('status','true')->get();
        $sitemap_product = product::where('status','true')->where('id',24)->get();
        $sitemap_news = news::where('status','true')->get();
        return response()->view('pages.sitemap', [
            'sitemap_category' => $sitemap_category,
            'sitemap_product' => $sitemap_product,
            'sitemap_news' => $sitemap_news
            ])->header('Content-Type', 'text/xml');
    }

    public function wishlist()
    {
        // $category = category::where('slug',$curl)->first();
        return view('pages.wishlist');
    }
    public function myaccount()
    {
        // $category = category::where('slug',$curl)->first();
        return view('pages.myaccount');
    }
    public function cart()
    {
        // $category = category::where('slug',$curl)->first();
        return view('pages.cart');
    }

    public function category($curl)
    {
        $category = category::where('slug',$curl)->first();
        if ($curl=='gioi-thieu') { return view('pages.about',['category'=>$category]); }
        if ($curl=='lien-he') { return view('pages.contact',['category'=>$category]); }
        
        $cates = category::where('parent', $category["id"])->get();
        $array = [$category["id"]];
        foreach ($cates as $cate) {
            $array[] = $cate->id;
            $cate1s = category::where('parent', $cate->id)->get();
            foreach ($cate1s as $cate1) {
                $array[] = $cate1->id;
            }
        }
        if ($category->sort_by == 1) {
            $product = product::where('status','true')->whereIn('category_id',$array)->orderBy('id','desc')->paginate(24);
            return view('pages.product',['category'=>$category, 'product'=>$product]);
        }
        if ($category->sort_by == 2) {
            $articles = articles::where('status','true')->whereIn('category_id',$array)->orderBy('id','desc')->paginate(15);
            return view('pages.news',['category'=>$category, 'articles'=>$articles]);
        }
        if ($category->sort_by == 3) {
            return view('pages.singlepage',['category'=>$category]);
        }
        
    }

    public function articles($curl,$arurl)
    {
        $articles = articles::where('slug',$arurl)->first();
        
        $id = $articles['id'];
        $articles->hits = $articles->hits + 1;
        $articles->save();

        $lienquan = articles::where('status','true')
            ->where('category_id',$articles->category_id)
            ->whereNotin('id',[$id])
            ->take(8)
            ->get();
        return view('pages.articles',[
            'articles'=>$articles,
            'lienquan'=>$lienquan
        ]);
    }

    public function post_search(Request $Request)
    {
        $articles = articles::orderBy('id','desc')->where('id','!=' , 0);
        if($Request->mebe){
            $articles->where('category_sku','like',"%$Request->mebe%");
        }
        // if($Request->mebe){
        //     $articles->where('name','like',"%$Request->name%");
        // }
        // if($Request->ngay1 && $Request->ngay2){
        //     $product->whereBetween('ngayketthuc', array($Request->ngay1, $Request->ngay2));
        // }
        $articles = $articles->paginate(30);
        return view('pages.home',[
            'articles'=>$articles,
        ]);
    }

    public function searchnews(Request $Request)
    {
        $key = $Request->key;
        $news = news::where('status','true')->where('name','like',"%$key%")->orderBy('id','desc')->paginate(24);
        return view('pages.search',['news'=>$news, 'key'=>$key]);
    }

    

    public function singlenews($curl,$nurl,$id)
    {
        $singlenews = news::where('id',$id)->first();
        $tinlienquan = news::where('status','true')->where('cat_id',$singlenews['cat_id'])->whereNotin('id',[$id])->take(10)->get();
        return view('pages.singlenews',['singlenews'=>$singlenews, 'tinlienquan'=>$tinlienquan]);
    }

	public function dangky(Request $Request)
    {
        $head_setting = setting::where('id',1)->first();
        $mail = $head_setting['email'];
		$this->validate($Request,['phone' => 'Required'],[] );
        $name = $Request->name;
        $phone = $Request->phone;
        $email = $Request->email;
        $link = $Request->link;
        $content = $Request->content;
		$date = date('m/d/Y h:i:s', time());
        
        Mail::send('email_feedback', array('name'=>$name,'phone'=>$phone,'email'=>$email,'link'=>$link,'content'=>$content,'date'=>$date) , function($message) use ($mail){
            $message->from($mail, 'hado.charmvillas.org');
            $message->to($mail, 'hado.charmvillas.org')->subject('Thông tin khách hàng');
        });
        //return view('pages.camon')->with('Alerts','Gửi thành công');
		return redirect('/')->with('Alerts','Thành công');
    }

}



