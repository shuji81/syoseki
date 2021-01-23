<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Syoseki;
use Illuminate\Http\Request;

class SyosekiController extends Controller
{
    public function index(Request $request)
    {
        //リクエストから検索テキストを抽出
        $keyword = $request->input("keyword");
        if(!empty($keyword))
        {
            //クエリビルダーでlike検索
            $items=DB::table('syoseki')->where('name','like','%' . $keyword . '%')
            ->orWhere('category','like','%' . $keyword . '%')->get();
        }
        else
        {
            //リクエストが取得できない場合、全件取得
            $items=DB::table('syoseki')->get();
        }
        return view('syoseki.index',['items' => $items]);
    }

    public function edit(Request $request){

        $id = $request->input("id");
        $items = array();
        $item=[
            'id'=>"",
            'name'=>"",
            'category'=>"",
            'num'=>""
        ];
        if(!empty($id))
        {
            //クエリビルダーで書籍を検索
            $items=DB::table('syoseki')->where('id','=',$id)->get();
            foreach($items as $value)
            {
                $item=[
                    'id'=>$value->id,
                    'name'=>$value->name,
                    'category'=>$value->category,
                    'num'=>$value->num
                ];
            }

        }
        return view('syoseki.edit',$item);
        
    }

    public function update(Request $request){


        $id = $request->input("id");
        $name = $request->input("name");
        $category = $request->input("category");
        $num = $request->input("num");
        $items = array();
        $today = date("Y-m-d H:i:s");

        if(!empty($id))
        {
            $items = DB::table('syoseki')->where('id', $id)
                    ->update([
                        'name' => $name,
                        'category' => $category,
                        'num' => $num,
                        'updated_at' => $today 
                    ]);
        }
        else
        {
            $items = DB::table('syoseki')->insertGetId(
                        [
                            'name' => $name,
                            'category' => $category,
                            'num' => $num,
                            'created_at' => $today,
                            'updated_at' => $today
                        ]
                    );

        }
        
        //リダイレクト
        return redirect()->to('./');
        
    }

    public function delete(Request $request){

        $id = $request->input("id");
        $items = array();

        if(!empty($id))
        {
            $items = DB::table('syoseki')->where('id', $id)
                    ->delete();
        }

        //リダイレクト
        return redirect()->to('./');
        
    }
}
