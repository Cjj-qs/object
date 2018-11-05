@extends('admin.layout.layout')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header" style="height:50px;">
    	<span><i class="icon-table"></i>轮播图库</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
        	<div id="DataTables_Table_0_length" class="dataTables_length">
        		<label>显示 <select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0">
        			<option value="5" selected="selected">5</option>
        			<option value="10">10</option>
        			<option value="15">15</option>
        		</select> 条</label>
        	</div>
        	<form action="/admin/sow" method="get">
        		{{ csrf_field() }}
	        	<div class="dataTables_filter">
	        		<label>查询: <input type="text" name="sname" value="{{ $request['sname'] or '' }}"></label>
	        		<input type="submit" value="确定" class="btn btn-info">
	        	</div>
        	</form>
        	<table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
            <thead>
                <tr role="row">
                	<th style="width: 259px;">ID</th>
                	<th style="width: 259px;">所属商家</th>
                	<th style="width: 260px;">商家链接</th>
                	<th style="width: 259px;">创建日期</th>
                	<th style="width: 259px;">缩略图</th>
                	<th>操作</th>
                </tr>
            </thead>
	        <tbody role="alert" aria-live="polite" aria-relevant="all">
	        	@foreach($sow as $k=>$v)
	            <tr>
	                <td>{{ $v['id'] }}</td>
	                <td>{{ $v['sname'] }}</td>
	                <td>{{ $v['link'] }}</td>
	                <td>{{ $v['created_at'] }}</td>
	                <td>
	                	<img src="{{ $v['smimg'] }}" style="width:150px;">
	                </td>
	                <td class="text-center">
	                	<a href="" class="btn btn-success">上架</a>
	                	<a href="" class="btn btn-warning">下架</a>
	                </td>
	            </tr>
	            @endforeach
	        </tbody>
    </table>
    </div>
    <div style="text-align:center;">
    	{!! $sow->appends($request)->render() !!}
    </div>
</div>
@endsection