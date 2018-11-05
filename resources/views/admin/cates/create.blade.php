@extends('admin.layout.layout')
@section('content')
<div class="mws-panel">
    <div class="mws-panel-header" style="height:50px;">
        <span>类别添加</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/cates" method="post">
        	{{csrf_field()}}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">父类</label>
                    <div>
                        <select class="small" style="width:350px;">
	                        @foreach($cates as $k=>$v)
                                {{ $n = substr_count($v['path'],',')-1 }}
                                @if($n < 0)
                                    $n = 0;
                                @endif
	                        <option @if ($v['cid'] == $id)selected @endif value="{$v['cid']}">{{str_repeat('&nbsp;',$n*5)}}|--{{$v['cname']}}</option>
	                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">添加类别</label>
                    <input type="text" name="add" style="width:350px;">
                </div>
            </div>
            <div class="mws-button-row text-center">
                <input type="submit" value="提交" class="btn btn-success">
                <input type="reset" value="重置" class="btn btn-warning">
            </div>
        </form>
    </div>
</div>
@endsection