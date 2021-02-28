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
            $items=DB::table('syoseki')->select('syoseki.id','syoseki.name','mcategory.category_name','syoseki.num')
            ->where('name','like','%' . $keyword . '%')
            ->join('mcategory','mcategory.id' ,'=' ,'syoseki.category_id')
            ->get();
        }
        else
        {
            //リクエストが取得できない場合、全件取得
            $items=DB::table('syoseki')->select('syoseki.id','syoseki.name','mcategory.category_name','syoseki.num')
            ->join('mcategory','mcategory.id' ,'=' ,'syoseki.category_id')
            ->get();
        }
        return view('syoseki.index',['items' => $items]);
    }

    public function edit(Request $request){

        $id = $request->input("id");
        $items = array();
        $categorys = array();
        $item=[
            'id'=>"",
            'name'=>"",
            'category_id'=>"",
            'category_name'=>"",
            'num'=>""
        ];

        $categorys=DB::table('mcategory')->get();

        

        if(!empty($id))
        {
            //クエリビルダーで書籍を検索
            $items=DB::table('syoseki')->select('syoseki.id AS id',
                                                'syoseki.name AS name',
                                                'mcategory.category_name AS category_name',
                                                'syoseki.num AS num',
                                                'mcategory.id AS category_id')
                                                ->join('mcategory','mcategory.id' ,'=' ,'syoseki.category_id')
                                                ->where('syoseki.id','=',$id)
                                                ->get();                                   
            foreach($items as $value)
            {
                $item=[
                    'id'=>$value->id,
                    'name'=>$value->name,
                    'category_id'=>$value->category_id,
                    'category_name'=>$value->category_name,
                    'num'=>$value->num
                ];

            }

        }
        return view('syoseki.edit')->with([
            "item" => $item,
            "categorys" => $categorys
         ]);
        
    }

    public function update(\App\Http\Requests\SyosekiValidateRequest $request){

        $id = $request->input("id");
        $name = $request->input("name");
        $category_id = $request->input("category_id");
        $num = $request->input("num");
        $items = array();
        $today = date("Y-m-d H:i:s");

        DB::beginTransaction();
        try {
            if(!empty($id))
            {
                $items = DB::table('syoseki')->where('id', $id)
                        ->update([
                            'name' => $name,
                            'category_id' => $category_id,
                            'num' => $num,
                            'updated_at' => $today 
                        ]);
            }
            else
            {
                $items = DB::table('syoseki')->insertGetId(
                            [
                                'name' => $name,
                                'num' => $num,
                                'created_at' => $today,
                                'updated_at' => $today,
                                'category_id' => $category_id
                            ]
                        );
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        
        //リダイレクト
        return redirect()->to('./');
        
    }

    public function delete(Request $request){

        $id = $request->input("id");
        $items = array();
        
        DB::beginTransaction();
        try {
            if(!empty($id))
            {
                $items = DB::table('syoseki')->where('id', $id)
                        ->delete();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        //リダイレクト
        return redirect()->to('./');
        
    }
}
