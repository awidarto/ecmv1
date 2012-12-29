@section('sidenav')
	<?php
		$role = Auth::user()->role;
		$permissions = Auth::user()->permissions;

	?>
    <div class="one columns mobile">     
      <dl class="vertical tabs">
        <dd><a href="{{ URL::base() }}"><i class="foundicon-home sidemenu"></i> <br/>Home</a></dd>
        <dd><a href="{{ URL::to('message') }}"><i class="foundicon-mail sidemenu"></i> <br/>Messages</a></dd>
        <dd><a href="{{ URL::to('tender') }}"><i class="foundicon-idea sidemenu"></i> <br/>Tender</a></dd>
        <dd><a href="{{ URL::to('project') }}"><i class="foundicon-star sidemenu"></i> <br/>Projects</a></dd>
        <dd><a href="{{ URL::to('qc') }}"><i class="foundicon-checkmark sidemenu"></i> <br/>Quality</a></dd>
        
        @if(Auth::permit('document'))
        	<dd><a href="{{ URL::to('warehouse') }}"><i class="foundicon-cart sidemenu"></i> <br/>Warehouse</a></dd>
        @endif

        <dd><a href="{{ URL::to('finance') }}"><i class="foundicon-graph sidemenu"></i> <br/>Finance</a></dd>
        <dd><a href="{{ URL::to('hr') }}"><i class="foundicon-people sidemenu"></i> <br/>HRD</a></dd>
        <dd><a href="{{ URL::to('activity/download') }}"><i class="foundicon-down-arrow sidemenu"></i> <br/>Download</a></dd>
        <dd><a href="{{ URL::to('activity/upload') }}"><i class="foundicon-up-arrow sidemenu"></i> <br/>Upload</a></dd>
        <dd><a href="{{ URL::to('user/people') }}"><i class="foundicon-address-book sidemenu"></i> <br/>People</a></dd>
        <dd><a href="{{ URL::to('search') }}"><i class="foundicon-search sidemenu"></i> <br/>Search</a></dd>
        <dd><a href="{{ URL::to('help') }}"><i class="foundicon-smiley sidemenu"></i> <br/>Help</a></dd>
      </dl>          
    </div>

@endsection