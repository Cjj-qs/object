<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use App\Http\Requests\UsersStoreRequest;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接收搜索的条件
        $showCount = $request->input('showCount','');
        $uname = $request->input('uname','');
        $phone = $request->input('phone','');

        $users = DB::table('users');
        if ( !empty($uname) ) {
           $users->where('uname','like','%'.$uname.'%'); 
        }
        if ( !empty($phone) ) {
           $users->where('phone','like','%'.$phone.'%'); 
        }
        $data = $users->orderBy('id','desc')->paginate($showCount);

        return view('admin.users.index',['request'=>$request->all(),'title'=>'用户列表','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',['title'=>'添加用户']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        // 检测是否有文件上传
        if($request -> hasFile('profile')){
           // 创建文件上传对象
            $profile = $request -> file('profile');
            $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('10').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路劲
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            exit;
        }
        $data['pwd'] = Hash::make($request->input('pwd'));
        $data['repwd'] = Hash::make($request->input('repwd'));
        $data['profile'] = $profile_path;
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        $user = DB::table('users')->where('uname',$data['uname'])->first();
        if($user){
            return redirect('admin/user/create')->with('error','用户名已存在');
        }
        $res = DB::table('users')->insert($data);
        if($res){
            return redirect('/admin/users')->with('success','添加成功');
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
        $user = User::find($id);
        return view('admin.users.edit',['title'=>'修改信息','user'=>$user]);
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
        $data = $request->except(['_token','_method']);
        // 检测是否有文件上传
        if($request -> hasFile('profile')){
           // 创建文件上传对象
            $profile = $request -> file('profile');
            $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('10').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路劲
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            exit;
        }
        $data['profile'] = $profile_path;
        $data['updated_at']  = date('Y-m-d H:i:s',time());
        $res = DB::table('users')->where('id',$id)->update($data);
        if($res){
            return redirect('/admin/users')->with('success','修改成功');
        }else{
            return redirect('/admin/users')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = User::destroy($id); //删除一条
        if($res){
            return redirect('/admin/users')->with('success','删除成功');
        }else{
            return redirect('/admin/users')->with('error','删除失败');
        }
    }
}
