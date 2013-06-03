@layout('dialog')

@section('content')
	<div class="displayboxscroll">
		{{  $i = 1; $navi = '';}}
		@foreach($doc['pages'] as $page)
			<div class="page-num"><a name="/#{{$page}}">{{ $page }}</a></div>
		    <img src="{{$doc['pagepath']}}/{{$page}}.png" data-big="{{$doc['pagepath']}}/{{$page}}" data-title="{{$page}}" data-description="My description">
		    {{ $navi .= '<a href="#'.$page.'">'.$i.'</a>&nbsp;&nbsp;'; }}
		    {{ $i++ }}
		@endforeach
		<div id="page-navi">Jump to : {{ $navi }}</div>
	</div>
	<style type="text/css">
		#page-navi{
			display: block;
			position:absolute;
			top: 0px;
			height:45px;
			background-color: #ccc;
		}

	</style>
@endsection

