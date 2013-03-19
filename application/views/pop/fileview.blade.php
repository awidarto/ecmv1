@layout('dialog')

@section('content')
	<iframe <?php
header('Content-disposition: inline');
header('Content-type: application/msword'); // not sure if this is the correct MIME type
readfile($href);
exit; ?>></iframe>
@endsection

