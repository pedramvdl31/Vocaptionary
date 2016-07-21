@extends($layout)
@section('stylesheets')
	<!-- blueimp Gallery styles -->
	<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
	<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	<link rel="stylesheet" href="/packages/blueimp/css/jquery.fileupload.css">
	<link rel="stylesheet" href="/packages/blueimp/css/jquery.fileupload-ui.css">
	<!-- CSS adjustments for browsers with JavaScript disabled -->
	<noscript><link rel="stylesheet" href="/packages/blueimp/css/jquery.fileupload-noscript.css"></noscript>
	<noscript><link rel="stylesheet" href="/packages/blueimp/css/jquery.fileupload-ui-noscript.css"></noscript>
	{!! Html::style('/packages/magnific/dist/magnific-popup.css') !!}
@stop
@section('scripts')
	{!! Html::script('/packages/lazy/lazyload.min.js') !!}
	{!! Html::script('/assets/js/resource_manage.js') !!}
	{!! Html::script('/packages/magnific/dist/jquery.magnific-popup.min.js') !!}
	<!-- The Templates plugin is included to render the upload/download listings -->
	<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
	<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
	<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<!-- blueimp Gallery script -->
	<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.iframe-transport.js"></script>
	<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload.js"></script>
	<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-process.js"></script>
	<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-image.js"></script>
	<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-audio.js"></script>
	<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-video.js"></script>
	<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-validate.js"></script>
	<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-jquery-ui.js"></script>
	<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-ui.js"></script>
	<!-- The template to display files available for upload -->
	<script id="template-upload" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
	    <tr class="template-upload fade">
	        <td>
	            <span class="preview"></span>
	        </td>
	        <td>
	            <p class="name">{%=file.name%}</p>
	            <strong class="error text-danger"></strong>
	        </td>
	        <td>
	            <p class="size">Processing...</p>

	        </td>
	        <td>
	            {% if (!i) { %}
	                <button class="btn btn-warning cancel">
	                    <i class="glyphicon glyphicon-ban-circle"></i>
	                    <span>Cancel</span>
	                </button>
		            <button type="button" class="btn btn-success remove hide" imgSrc="">
		                <i class="glyphicon glyphicon-ok"></i>
		                <span>Saved</span>
		            </button>
	            {% } %}
	        </td>
	    </tr>
	{% } %}
	</script>
	<!-- The template to display files available for download -->
	<script id="template-download" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
	    <tr class="template-download fade">
	        <td>
	            <span class="preview">
	                {% if (file.thumbnailUrl) { %}
	                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
	                {% } %}
	            </span>
	        </td>
	        <td>
	            <p class="name">
	                {% if (file.url) { %}
	                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
	                {% } else { %}
	                    <span>{%=file.name%}</span>
	                {% } %}
	            </p>
	            {% if (file.error) { %}
	                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
	            {% } %}
	        </td>
	        <td>
	            <span class="size">{%=o.formatFileSize(file.size)%}</span>
	        </td>
	        <td>
	            {% if (file.deleteUrl) { %}
	                <button class="btn btn-success saved" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
	                    <i class="glyphicon glyphicon-trash"></i>
	                    <span>Saved</span>
	                </button>
	            {% } else { %}
	                <button class="btn btn-warning cancel">
	                    <i class="glyphicon glyphicon-ban-circle"></i>
	                    <span>Cancel</span>
	                </button>
	            {% } %}
	        </td>
	    </tr>
	{% } %}
	</script>

	{!! Html::script('/assets/js/resource_manage.js') !!}
@stop
@section('sidebar')
<div class="nav nav-stacked hide list-group" id="sidebar-inner">
	<a href="#top" class="list-group-item">Top of page</a>
	<a href="#step1" class="list-group-item">Resource Upload</a>
	<a href="#step2" class="list-group-item">Resource Manage</a>

</div>    
@stop
@section('content')
<style type="text/css">
	.mfp-close{
		cursor: pointer !important;
	}
</style>
	<div id="top" class="jumbotron">
		<h1>Resources</h1>
		<ol class="breadcrumb">
			<li class="active">Manage Resources</li>
		</ol>
	</div>


	<form id="fileupload" action="/admins/resources/file-upload" method="POST" enctype="multipart/form-data">



			<div class="panel panel-default">
				
				<div class="panel-heading"><h4>Main Image</h4></div>
		        <!-- The global progress state -->
		        <div class="col-lg-12 fileupload-progress fade">
		            <!-- The global progress bar -->
		            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
		                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
		            </div>
		            <!-- The extended global progress state -->
		            <div class="progress-extended">&nbsp;</div>
		        </div>
				<div id="step1_panel" class="panel-body">
					<!-- The table listing the files available for upload/download -->
			        <table id="displayImagesTable-main" kind="main" role="presentation" class="table table-striped top"><tbody class="files"></tbody></table>
				</div>
				<div class="panel-footer clearfix">
					<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
			        <div class="fileupload-buttonbar">
			            <div class="col-lg-7">
			                <!-- The fileinput-button span is used to style the file input field as button -->
			                <span class="btn btn-success fileinput-button">
			                    <i class="glyphicon glyphicon-plus"></i>
			                    <span>Add Main Image</span>
			                    <input type="file" name="files[]" multiple>
			                </span>
			                <button type="reset" class="btn btn-warning cancel">
			                    <i class="glyphicon glyphicon-ban-circle"></i>
			                    <span>Cancel upload</span>
			                </button>
			                <!-- The global file processing state -->
			                <span class="fileupload-process"></span>
			            </div>
			        </div>
		    	</div>
			</div>	




    </form>





	
	<div id="step2" class="panel panel-default">
		
		<div class="panel-heading">
			<h4>Resource Manage <a href="{!! action('ResourcesController@getEdit',$companies['id']) !!}" type="button" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> refresh images</a></h4>
		</div>
		<div id="step1_panel" class="panel-body">
		@if(isset($resources))
			<?php $idx = 0; ?>
			@foreach($resources as $key => $value)
			<?php
			$idx++;
			$img = pathinfo('/'.$value);
			$img_base = $img['basename'];
			list($width, $height) = @getimagesize($value);
			?>
			<div class="row-fluid">
				<div class="col-sm-4 col-md-3" >
					<div class="thumbnail" style="height:300px;">
						@if($idx < 5)
						<img src="/{!! $value !!}" alt="..." style="min-height:75px; max-height:150px; min-width:75px; max-width:250px;">
						@else
						<img class="lazy" data-original="/{!! $value !!}" alt="..." style="min-height:75px; max-height:150px; min-width:75px; max-width:250px;">
						@endif
						
						<div class="caption">
							<h5>{!! $img_base !!}</h5>
							<p>w:{!! $width !!}px  h:{!! $height !!}px</p>
							<p>
								<a class="popup-link btn btn-default" href="/{!! $value !!}"><i class="glyphicon glyphicon-picture"></i></a>
								<a href="/{!! $value !!}" target="_blank" class="btn btn-info" role="button"><span class="glyphicon glyphicon-new-window"></span></a> 
								<a data-src="{!! $value !!}" class="deleteImage btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span></a>
							</p>
						</div>
					</div>
				</div>
			</div>			
			@endforeach
		@endif
		</div>
	</div>

@stop
