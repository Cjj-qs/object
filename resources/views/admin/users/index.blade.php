@extends('admin.layout.layout')
@section('content')
<!-- 	<div class="mws-panel grid_8">
        <div class="mws-panel-header" style="height:50px;">
            <span><i class="icon-magic"></i> {{$title}}</span>
        </div>
        <form action="/admin/user" method="get" class="form-inline" style="margin-top:10px;">
		  	<div class="form-group pull-left">
			    <label for="phone">手机 ：</label>
			    <input type="text" value="{{ $request['phone'] or ''}}" class="form-control" id="phone" name="phone" placeholder="按手机号码搜索">
		  	</div>
		  	<div class="form-group pull-left" style="margin-left: 20px">
			    <label for="uname">用户 ：</label>
			    <input type="text" class="form-control" value="{{ $request['uname'] or '' }}" id="uname" name="uname" placeholder="按用户的名称搜索">
		  	</div>
		  	<button type="submit" class="btn btn-success">搜索</button>
		</form>
        <table class="table text-center table-bordered" style="margin:auto">
                <tr  class="text-center" style>
                    <th><input type="checkbox" name="[]"></th>
                    <th>ID</th>
                    <th>权限</th>
                    <th>用户名</th>
                    <th>性别</th>
                    <th>头像</th>
                    <th>手机</th>
                    <th>邮箱</th>
                    <th>时间</th>
                    <th>地址</th>
                    <th>操作</th>  
                </tr>
            	@foreach($data as $v)
                <tr style="margin:auto;">
                    <td><input type="checkbox" name="[]"></td>
                    <td>{{$v['id']}}</td>
                    <td>
                    	@if ($v['auth'] == 1)
                    		普通会员
                    	@elseif ($v['auth'] == 2)
                    		普通管理员
                    	@elseif ($v['auth'] == 3)
                    		超级管理员
                    	@endif
                    </td>
                    <td>{{$v['uname']}}</td>
                    <td>
                    	@if ($v['sex'] = 'm')
                    		男
                    	@else
                    		女
                    	@endif
                    </td>
                    <td>
                    	<img src="{{$v['profile']}}" style="width:30px;">
                    </td>
                    <td>{{$v['phone']}}</td>
                    <td>{{$v['email']}}</td>
                    <td>{{$v['created_at']}}</td>
                    <td>{{$v['addr']}}</td>
                    <td>
                    	<a href="/admin/user/{{$v['id']}}/edit" class="btn btn-success">修改</a>
                    	<form action="/admin/user/{{$v['id']}}" method="post" style="display:inline-block;">
                    		{{ csrf_field() }}
    						{{ method_field('DELETE') }}
                    		<input type="submit" class="btn btn-danger" value="删除">
                    	</form>
                    </td>
                </tr>
                @endforeach
    	</table>
	</div> -->

    <div class="mws-panel grid_8">
        <div class="mws-panel-header" style="height:50px;">
            <span><i class="icon-table"></i> {{$title}}</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                <form action="/admin/users" method="get" class="form-inline" style="margin-top:10px;">
                    <div id="DataTables_Table_1_length" class="dataTables_length">
                        <label>显示 
                            <select size="1" name="showCount" aria-controls="DataTables_Table_1">
                                <option value="5" selected="selected">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select> 条
                        </label>
                    </div>
                    <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        <label>Search: 
                            <input type="text" value="{{ $request['uname'] or '' }}" name="uname" placeholder="按用户的名称搜索">
                            <input type="text" value="{{ $request['phone'] or ''}}" name="phone" placeholder="按手机号码搜索">
                            <input type="submit" class="btn btn-success" value="搜索">
                        </label>
                    </div>
                </form>
                
                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                    <thead>
                        <tr role="row">
                            <th><input type="checkbox" name="[]"></th>
                                <th>ID</th>
                                <th>权限</th>
                                <th>用户名</th>
                                <th>性别</th>
                                <th>头像</th>
                                <th>手机</th>
                                <th>邮箱</th>
                                <th>时间</th>
                                <th>操作</th>  
                        </tr>
                    </thead>
                    
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($data as $v)
                <tr style="margin:auto;">
                    <td><input type="checkbox" name="[]"></td>
                    <td>{{$v['id']}}</td>
                    <td>
                        @if ($v['auth'] == 1)
                            普通会员
                        @elseif ($v['auth'] == 2)
                            普通管理员
                        @elseif ($v['auth'] == 3)
                            超级管理员
                        @endif
                    </td>
                    <td>{{$v['uname']}}</td>
                    <td>
                        @if ($v['sex'] = 'm')
                            男
                        @else
                            女
                        @endif
                    </td>
                    <td>
                        <img src="{{$v['profile']}}" style="width:30px;">
                    </td>
                    <td>{{$v['phone']}}</td>
                    <td>{{$v['email']}}</td>
                    <td>{{$v['created_at']}}</td>
                    <td>
                        <a href="/admin/users/{{$v['id']}}/edit" class="btn btn-success">修改</a>
                        <form action="/admin/users/{{$v['id']}}" method="post" style="display:inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger" value="删除">
                        </form>
                    </td>
                </tr>
                @endforeach
                    </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
            <div class="text-center" style="margin-left: 800px;">
                {!! $data->appends($request)->render() !!}
            </div>
            
            </div>
        </div>
    </div>
@endsection