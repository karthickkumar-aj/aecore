@extends('layouts.application.main_wide')
@section('content')

  @include('tasks.nav')
  <div class="task-list-wrapper">
    <!-- FILTERS -->
    <div class="pagehead">
      <div class="container-fluid">
        <span class="btn btn-info btn-sm pull-right">Clear Completed Tasks</span>
        <h1>Task List Name</h1>
      </div>
    </div>
    
    <!-- NEW TASK INPUT -->
    <div class="container-fluid">
      {!! Form::open(array('url' => '', 'method' => 'post', 'class' => 'form-horizontal')) !!}
        <div class="input-group">    
          <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
          {!! Form::text('task', null, array('class' => 'form-control', 'placeholder' => 'Add a task...', 'autocomplete'=>'off', 'required'=>'true', 'autofocus'=>'true', 'title'=>'Press Enter to submit.', 'onFocus'=>'$(\'#task-hint\').show();', 'onBlur'=>'$(\'#task-hint\').hide();' )) !!}
        </div>  
        <span id="task-hint" class="text-muted small" style="display:none;">Hint: Press Enter to Submit</span>
        {!! Form::hidden('to_list', Session::get('listcode')) !!}
      {!! Form::close() !!}
    </div>
  

    
  </div>
@endsection