@extends('admin.layout.layout')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header" style="height:50px;">
    	<span>轮播图添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/sow" method="post" enctype="multipart/form-data">
    		{{csrf_field()}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">所属商家</label>
    				<div class="mws-form-item">
    					<input type="text" class="large" name="sname">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">商家链接</label>
    				<div class="mws-form-item">
    					<input type="text" class="large" name="link">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">缩略图</label>
    				<div class="mws-form-item">
    					<input type="file" class="large" name="smimg">
    				</div>
    			</div>
    		<div class="mws-button-row text-center"  style="padding-bottom:25px;">
    			<input type="submit" value="提交" class="btn btn-success">
    			<input type="reset" value="重置" class="btn btn-info">
    		</div>
    	</form>
    </div>    	
</div>
@endsection