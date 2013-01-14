@section('topnav')

<ul class="">
  <!--<li class="divider"></li>-->

  <li>{{ HTML::link('document/type/general','General')}}</li>
  <li>{{ HTML::link('document/type/project_control','Project Control')}}</li>
  <li class="has-dropdown">{{ HTML::link('document/type/outdoor_sales','Sales & Marketing')}}
    <ul class="dropdown">
      <li>{{ HTML::link('document/type/outdoor_sales','Outdoor Sales')}}</li>
      <li>{{ HTML::link('document/type/indoor_sales','Indoor Sales')}}</li>
    </ul>
  </li>
  <li class="has-dropdown">{{ HTML::link('document/type/bod','Board of Director')}}
    <ul class="dropdown">
      <li>{{ HTML::link('document/type/president_director','President Director')}}</li>
      <li>{{ HTML::link('document/type/operations_director','Operations Director')}}</li>
      <li>{{ HTML::link('document/type/finance_hr_director','Finance & HR Director')}}</li>
    </ul>
  </li>
  <li>{{ HTML::link('document/type/finance_pusat','Finance & Accounting')}}
  </li>
  <li class="has-dropdown">{{ HTML::link('document/type/finance_pusat','Balikpapan Office')}}
    <ul class="dropdown">
      <li>{{ HTML::link('document/type/tender_balikpapan','Bidding & Tendering')}}</li>
      <li>{{ HTML::link('document/type/sales_balikpapan','S&M Balikpapan')}}</li>
      <li>{{ HTML::link('document/type/finance_balikpapan','F&A Balikpapan')}}</li>
    </ul>
  </li>

  <li>{{ HTML::link('document/type/hr_admin','HR Admin')}}</li>
  <li>{{ HTML::link('document/type/warehouse','Warehouse')}}</li>
  <li>{{ HTML::link('document/type/qc','Quality Control')}}</li>

  <li class="has-dropdown">{{ HTML::link('document/type/clients','3rd Parties')}}
    <ul class="dropdown">
      <li>{{ HTML::link('document/type/clients','Clients')}}</li>
      <li>{{ HTML::link('document/type/principal_vendor','Principal / Vendors')}}</li>
      <li>{{ HTML::link('document/type/subcon','3rd Party / Sub-Con')}}</li>
    </ul>
  </li>


  <li class="divider"></li>
  <li class="has-dropdown">
    <a href="#">Administration</a>
    <ul class="dropdown">
      <li>{{ HTML::link('document', 'Document Library' ) }}</li>
      <li>{{ HTML::link('category', 'Category Manager' ) }}</li>
      <li>{{ HTML::link('users', 'Users Management' ) }}</li>
    </ul>
  </li>
  <li>{{ HTML::link('logout', 'Logout') }}</li>
</ul>

@endsection
      