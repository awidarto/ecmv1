@section('sidenav')
	<?php
		$role = Auth::user()->role;
		$permissions = Auth::user()->permissions;

        if($role != 'root' || $role != 'super'){
            $doctype = Auth::user()->department;
        }else{
            $doctype = '';
        }

        //print $role;

        /*
        <dd><a href="{{ URL::to('document') }}"><i class="foundicon-page sidemenu"></i> <br/>Documents</a></dd>
        <dd><a href="{{ URL::to('opportunity') }}"><i class="foundicon-heart sidemenu"></i> <br/>Opportunity</a></dd>
        <dd><a href="{{ URL::to('tender') }}"><i class="foundicon-idea sidemenu"></i> <br/>Tender</a></dd>
        <dd><a href="{{ URL::to('qc') }}"><i class="foundicon-checkmark sidemenu"></i> <br/>Quality</a></dd>

        @if(Auth::permit('document'))
            <dd><a href="{{ URL::to('warehouse') }}"><i class="foundicon-cart sidemenu"></i> <br/>Warehouse</a></dd>
        @endif

        <dd><a href="{{ URL::to('finance') }}"><i class="foundicon-graph sidemenu"></i> <br/>Finance</a></dd>
        <dd><a href="{{ URL::to('hr') }}"><i class="foundicon-people sidemenu"></i> <br/>HRD</a></dd>
        <dd><a href="{{ URL::to('activity/download') }}"><i class="foundicon-down-arrow sidemenu"></i> <br/>Download</a></dd>
        <dd><a href="{{ URL::to('activity/upload') }}"><i class="foundicon-up-arrow sidemenu"></i> <br/>Upload</a></dd>
        <dd><a href="{{ URL::to('user/people') }}"><i class="foundicon-address-book sidemenu"></i> <br/>People</a></dd>

        */

	?>
    <div class="one columns mobile sidenav">
      <dl class="vertical tabs">
        <!--<dd><a href="{{ URL::base() }}"><i class="foundicon homeicon iconnew sidemenu"></i>Home</a></dd>-->
            <dd><a href="{{ URL::to('document/add/'.$doctype) }}"><i class="foundicon iconnew add sidemenu"></i>New<br />Document</a></dd>
            @if($role != 'subcon')
                <dd><a href="{{ URL::to('message') }}"><i class="foundicon mail iconnew sidemenu"></i>Messages</a></dd>
                <dd><a href="{{ URL::to('requests/incoming') }}"><i class="foundicon iconnew download sidemenu"></i>Incoming Requests</a></dd>
                <dd><a href="{{ URL::to('requests/outgoing') }}"><i class="foundicon iconnew upload sidemenu"></i>Submissions <br />&<br /> Requests</a></dd>
                <dd><a href="{{ URL::to('template') }}"><i class="foundicon page iconnew sidemenu"></i>Templates</a></dd>

                @if($role != 'hr_admin')
                    <dd><a href="{{ URL::to('opportunity') }}"><i class="foundicon flag iconnew sidemenu"></i>Opportunity</a></dd>
                    <dd><a href="{{ URL::to('tender') }}"><i class="foundicon forward iconnew sidemenu"></i>Tender</a></dd>
                    <dd><a href="{{ URL::to('project') }}"><i class="foundicon tools iconnew sidemenu"></i>Projects</a></dd>
                @endif

                @if($role == 'hr_admin' || $role == 'root' || $role == 'super' || $role = 'president' || $role == 'bod')
                    <dd><a href="{{ URL::to('employee') }}"><i class="foundicon iconnew group sidemenu"></i>Human Resources</a></dd>
                @endif

                <!--<dd><a href="{{ URL::to('user/profile') }}"><i class="foundicon iconnew user sidemenu"></i>Profile</a></dd>
                <dd><a href="{{ URL::to('search') }}"><i class="foundicon search iconnew sidemenu"></i>Search</a></dd>-->
            @else
                <dd><a href="{{ URL::to('message') }}"><i class="foundicon mail iconnew sidemenu"></i>Messages</a></dd>
            @endif
        <!--<dd><a href="{{ URL::to('content/view/help') }}"><i class="foundicon help iconnew sidemenu"></i>Help</a></dd>-->
      </dl>
    </div>

@endsection