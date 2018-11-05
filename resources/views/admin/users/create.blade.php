@extends('admin.layout.layout')
@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header" style="height:50px;">
        <span><i class="icon-table"></i> {{$title}}</span>
    </div>
    <form class="mws-form" action="/admin/users" method="post" enctype="multipart/form-data">
    	{{ csrf_field() }}
    	<div class="mws-form-inline">
        	<div id class="mws-form-row">
                <label class="mws-form-label">权限 ：</label>
                <div class="mws-form-item">
                    <select name="auth" class="small">
                        <option value="1">普通会员</option>
                        <option value="2">普通管理员</option>
                        <option value="3">超级管理员</option>
                    </select>
                </div>
            </div>
        	<div id class="mws-form-row">
                <label class="mws-form-label">用户名 </label>
                <div class="mws-form-item">
                    <input type="text" name="uname" value="{{ old('uname') }}" class="small">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">密码 </label>
                <div class="mws-form-item">
                    <input type="password" name="pwd" class="small">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">确认密码 </label>
                <div class="mws-form-item">
                    <input type="password" name="repwd" class="small">
                </div>
            </div>
            <div id class="mws-form-row">
                <label class="mws-form-label">头像 </label>
                <div class="mws-form-item">
                    <input type="file" name="profile" class="small" value="">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">邮箱 </label>
                <div class="mws-form-item">
                    <input type="email" name="email" class="small" value="{{ old('email') }}">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">电话 </label>
                <div class="mws-form-item">
                    <input type="text" name="phone" class="small" value="{{ old('phone') }}">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">地址 </label>
                <div class="mws-form-item">
                    <textarea name="addr" rows="" cols="" class="small">{{ old('addr') }}</textarea>
                </div>
            </div>
            <div class="mws-form-row">
				<label class="mws-form-label">性别 </label>
				<div class="mws-form-item clearfix">
					<ul class="mws-form-list inline">
						<li><input type="radio" name="sex" value="m" checked> <label>男</label></li>
						<li><input type="radio" name="sex" value="w"> <label>女</label></li>
					</ul>
				</div>
			</div>
			<div class="mws-button-row">
    			<input type="submit" value="Submit" class="btn btn-danger">
    			<input type="reset" value="Reset" class="btn ">
    		</div>
        </div>
    </form>
</div>
@endsection