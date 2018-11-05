@extends('admin.layout.layout')
@section('content')
    <form class="mws-form" action="/admin/users/{{$user['id']}}" method="post" enctype="multipart/form-data">
    	{{ csrf_field() }}
        {{ method_field('PUT') }}
    	<div class="mws-form-inline">
        	<div id class="mws-form-row">
                <label class="mws-form-label">权限 ：<span class="required">*</span></label>
                <div class="mws-form-item">
                    <select name="auth" class="required large">
                        <option @if ($user['auth'] == 1) selected @endif value="1">普通会员</option>
                        <option @if ($user['auth'] == 2) selected @endif value="2">普通管理员</option>
                        <option @if ($user['auth'] == 3) selected @endif value="3">超级管理员</option>
                    </select>
                </div>
            </div>
        	<div id class="mws-form-row">
                <label class="mws-form-label">用户名 <span class="required">*</span></label>
                <div class="mws-form-item">
                    <input type="text" name="uname" value="{{$user['uname']}}" class="required large">
                </div>
            </div>
            <div id class="mws-form-row">
                <label class="mws-form-label">头像 <span class="required">*</span></label>
                <div class="mws-form-item">
                    <img src="{{$user['profile']}}" style="width:30px;">
                    <input type="file" name="profile" class="required large" value="">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">邮箱 <span class="required">*</span></label>
                <div class="mws-form-item">
                    <input type="email" name="email" value="{{$user['email']}}" class="required email large">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">电话 <span class="required">*</span></label>
                <div class="mws-form-item">
                    <input type="text" name="phone" value="{{$user['phone']}}" class="required phone large">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">地址 <span class="required">*</span></label>
                <div class="mws-form-item">
                    <textarea name="addr" rows="" cols="" class="required large">{{$user['addr']}}</textarea>
                </div>
            </div>
            <div class="mws-form-row">
				<label class="mws-form-label">性别 <span class="required">*</span></label>
				<div class="mws-form-item clearfix">
					<ul class="mws-form-list inline">
						<li><input type="radio" name="sex" @if ($user['sex'] == 'm') checked @endif value="m"> <label>男</label></li>
						<li><input type="radio" name="sex" @if ($user['sex'] == 'w') checked @endif value="w"> <label>女</label></li>
					</ul>
				</div>
			</div>
			<div class="mws-button-row">
    			<input type="submit" value="Submit" class="btn btn-danger">
    			<input type="reset" value="Reset" class="btn ">
    		</div>
        </div>
    </form>

@endsection