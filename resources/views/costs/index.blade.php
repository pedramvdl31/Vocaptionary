@extends($layout)
@section('stylesheets')
@stop
@section('scripts')
{{ Html::script('js/costs/index.js') }}
@stop
@section('content')
<div class="jumbotron">
	<h1>Costs</h1>
	<ol class="breadcrumb">
		<li class="active">Costs Overview</li>
	</ol>
</div>


	
@stop