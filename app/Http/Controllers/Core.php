<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Desc;
use App\Post;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class Core extends Controller
{

    public function index(){
        return view('frontend.layout.template');
    }

    public function getCategory($cat_name){
        $results = Post::where('cat_name',$cat_name)->paginate(4);
        return  view('frontend.category')->with(['results'=>$results]);
    }

    public function getProduct($id){
        $data = Post::where('id',$id)->get();
        foreach ($data as $item){
            $cat_name = $item->cat_name;
        }
        $data1 = Desc::where('post_id',$id)->get();
        $results = Post::where('cat_name',$cat_name)
            ->whereNotIn('id',[$id])
            ->inRandomOrder()
            ->limit(4)
            ->get();
        return view('frontend.product')->with(['data'=>$data,'data1'=>$data1,'results'=>$results]);
    }

    public function getCats(){
        $results = DB::table('posts')->paginate(3);
        return view('frontend.category')->with(['results'=>$results]);
    }

    public function setCookies(Request $request)
    {
        $id = $request->post_id;
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $data = DB::table('carts')->select('post_id')->get();
            foreach ($data as $item){
                if($item->post_id == $id){
                    DB::table('carts')->where('post_id',$id)
                        ->update(['updated_at' => date('Y-m-d H:i:s')]);
                    return "This is product update to wish list";
                }
            }
            DB::table('carts')
                ->insert(['post_id' => $id,
                    'user_id' => $user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')]);
            setcookie("cookie[$id]",$id,time() + (3 * 365 * 24 * 60 * 60));
            return "This is product add to wish list";
        }else{
            setcookie("cookie[$id]",$id,time() + (3 * 365 * 24 * 60 * 60));
            return "This is product add to wish list";
        }
    }

    public function getCart(){
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $data = Post::join('carts', 'posts.id', '=', 'carts.post_id')
                ->select('posts.*', 'carts.*')
                ->where('carts.user_id', '=', $user_id)
                ->orderBy('carts.updated_at', 'DESC')
                ->paginate(14);
            return view('frontend.cart')->with(['data' => $data]);
        }elseif(isset($_COOKIE['cookie'])){
            $cookData = $_COOKIE['cookie'];
            $data = Post::whereIn('id', $cookData)
                ->paginate(14);
            return view('frontend.cart')->with(['data'=>$data]);
        }else{
            return view('frontend.cart')->with(['data'=>""]);
        }
    }
    public function delCookies($id){
        if(Auth::check()) {
            Cart::where('post_id',$id)->delete();
            return redirect('/cart');
        }else {
            Cookie::queue(Cookie::forget("cookie[$id]"));
            return redirect('/cart');
        }
    }
    public function order($id){
        $data2 = Post::where('id',$id)->get();
        return view('frontend.cart')->with(['data2'=>$data2]);
    }

}
