@layout('master')

@section('content')
	
	<h3>Project per 2013</h3>
	
	<img src="{{ URL::to('chart/projecttimeline')}}" alt="graphtest" style="position:left;margin-right:20px;"/>
	<img src="{{ URL::to('chart/projectpie')}}" alt="graphtest" style="position:left;margin-right:20px;"/>

	<div class="clear">&nbsp;</div>
	<h3>Tender per 2013</h3>
	
	<img src="{{ URL::to('chart/tendertimeline')}}" alt="graphtest" style="position:left;margin-right:20px;"/>
	<img src="{{ URL::to('chart/projectpie')}}" alt="graphtest" style="position:left;margin-right:20px;"/>

@endsection