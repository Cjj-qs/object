<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class SowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sname = $request->input('sname','');

        $data = DB::table('sows')
                ->where('sname','like','%'.$sname.'%')
                ->paginate(5);

        return view('admin.sow.index',['request'=>$request->all(),'sow'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sow = $request->except('_token');
        // 检测是否有文件上传
        if( $request->hasFile('smimg') ) {
           // 创建文件上传对象
            $profile = $request -> file('smimg');
            $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('10').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路劲
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            exit;
        }
        $sow['smimg'] = $profile_path;
        $sow['created_at'] = date('Y-m-d H:i:s',time());
        $sow['updated_at'] = date('Y-m-d H:i:s',time());
        $res = DB::table('sows')->insert($sow);
        if($res){
            return redirect('/admin/sow')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
