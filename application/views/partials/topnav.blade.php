@section('topnav')

<ul class="mainnavparama">
  <!--<li class="divider"></li>-->
@if(Auth::user()->role == 'client' || Auth::user()->role == 'principal_vendor' || Auth::user()->role == 'subcon')
    
    @if(Auth::user()->role == 'client')
      <li>{{ HTML::link('document/type/clients','Clients')}}</li>
    @elseif(Auth::user()->role == 'principal_vendor')
      <li>{{ HTML::link('document/type/principal_vendor','Principal / Vendors')}}</li>
    @elseif(Auth::user()->role == 'subcon')
      <li>{{ HTML::link('document/type/subcon','3rd Party / Sub-Con')}}</li>
    @endif    



@else

  <li class="has-dropdown">
    {{ HTML::link('document/type/bod','BoD')}}
    <ul class="dropdown">
      <li>{{ HTML::link('document/type/president_director','President Director')}}</li>
      <li>{{ HTML::link('document/type/operations_director','Operations Director')}}</li>
      <li>{{ HTML::link('document/type/finance_hr_director','Finance & HR Director')}}</li>
    </ul>
  </li>
  <li>{{ HTML::link('document/type/finance_pusat','Finance & Accounting')}}
  <li>{{ HTML::link('document/type/hr_admin','HR & GA')}}</li>
  <li>{{ HTML::link('document/type/indoor_sales','Indoor Sales')}}</li>
  <li>{{ HTML::link('document/type/outdoor_sales','Outdoor Sales')}}</li>
  <li>{{ HTML::link('document/type/project_control','Project Control')}}</li>
  <li>{{ HTML::link('document/type/warehouse','Warehouse')}}</li>
  <li>{{ HTML::link('document/type/qc','Quality Control')}}</li>


  <li class="has-dropdown">
    {{ HTML::link('document/type/finance_pusat','Balikpapan Office')}}
    <ul class="dropdown">
      <li>{{ HTML::link('document/type/tender_balikpapan','Bidding & Tendering')}}</li>
      <li>{{ HTML::link('document/type/sales_balikpapan','S&M Balikpapan')}}</li>
      <li>{{ HTML::link('document/type/finance_balikpapan','F&A Balikpapan')}}</li>
    </ul>
  </li>
  <li>{{ HTML::link('document/type/general','General')}}</li>

  <li class="has-dropdown">
    {{ HTML::link('document/type/clients','Others')}}
    <ul class="dropdown">
      <li>{{ HTML::link('document/type/clients','Clients')}}</li>
      <li>{{ HTML::link('document/type/principal_vendor','Principal / Vendors')}}</li>
      <li>{{ HTML::link('document/type/subcon','3rd Party / Sub-Con')}}</li>
    </ul>
  </li>

@endif


@if(Auth::user()->role == 'root' || Auth::user()->role == 'super')
  <li class="divider"></li>
  <li class="has-dropdown">
    <a href="#">Sys Admin</a>
    <ul class="dropdown rightDirection">
      <li>{{ HTML::link('document', 'Document Super Manager' ) }}</li>
      <li>{{ HTML::link('download', 'Download Log' ) }}</li>
      <li>{{ HTML::link('content', 'Article Manager' ) }}</li>
      <li>{{ HTML::link('users', 'User Manager' ) }}</li>
      <li>{{ HTML::link('contact/client', 'Clients' ) }}</li>
      <li>{{ HTML::link('contact/vendor', 'Vendors' ) }}</li>
    </ul>
  </li>
@endif

</ul>

@endsection
      