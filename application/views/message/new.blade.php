@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>
<?php 
print Former::horizontal_open()
  ->id('MyForm')
  ->secure()
  ->rules(array( 'name' => 'required' ))
  ->method('GET');
?>

<div class="row">
  <div class="twelve columns">
    <?php
    print Former::large_text('from')
        ->class('myclass')
        ->value('Joseph')
        ->required();

    print Former::large_text('to')
        ->class('myclass')
        ->value('Joseph')
        ->required();

    print Former::large_text('subject')
        ->class('myclass')
        ->value('Joseph')
        ->required();

    print Former::textarea('message')
        ->rows(10)->columns(20)
        ->autofocus();

    print Former::actions (
        Former::large_primary_submit('Send'),
        Former::large_inverse_reset('Reset')
      );
    ?>
  </div>
</div>

<?php
print Former::close();

?>

@endsection