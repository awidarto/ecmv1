@layout('dialog')

@section('content')
<<<<<<< HEAD
	<iframe <?php
header('Content-disposition: inline');
header('Content-type: application/msword'); // not sure if this is the correct MIME type
readfile($href);
exit; ?>></iframe>
=======
	<div class="displaybox">
		<iframe class="fileviewer" src="{{$href}}"></iframe>
	</div>
>>>>>>> 61103b2a557619b6c850484225723fab4470570f
@endsection

