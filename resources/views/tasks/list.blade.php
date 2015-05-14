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
        {!! Form::text('task', null, array('class' => 'form-control', 'placeholder' => 'Add a task...', 'autocomplete'=>'off', 'required'=>'true', 'autofocus'=>'true', 'title'=>'Press Enter to submit.', 'onFocus'=>'$(\'#task-hint\').show();', 'onBlur'=>'$(\'#task-hint\').hide();' )) !!}
        <span id="task-hint" class="text-muted small" style="display:none;">Hint: Press Enter to Submit</span>
        {!! Form::hidden('to_list', Session::get('listcode')) !!}
      {!! Form::close() !!}
    </div>
  
    <!-- USER TASK LIST -->
    <div class="taskline col-md-12" id="taskline-1" onmouseover="$('#expand-1').addClass('taskline-button-gray');" onmouseout="$('#expand-1').removeClass('taskline-button-gray');">
        <span class="taskline-checkbox" id="task-checkbox-1" title="Mark as complete." onClick="task_complete('1');"></span>      
        <div class="btn-group task-btn-group">
          <button data-toggle="dropdown" class="btn btn-1 dropdown-toggle task-priority-tag" title="Change task priority." type="button"><span class="caret" style="margin-top:-7px;"></span></button>
          <ul class="dropdown-menu task-priority-list">
            <li><a href="{!! URL::to('tasks/priority/3/') !!}"><span class="label label-danger">High Priority</span></a></li>
            <li><a href="{!! URL::to('tasks/priority/2/') !!}"><span class="label label-warning">Medium Priority</span></a></li>
            <li><a href="{!! URL::to('tasks/priority/1/') !!}"><span class="label label-info">Low Priority</span></a></li>
          </ul>
        </div>
      <div class="taskline-input-wrapper">
        <span id="task-date-1" class="task_date">Jan 1</span>
        <input type="text" class="form-control taskline-input" id="task-text-1" value="Sample task 1" onFocus="$('#taskline-1').addClass('taskline-active');taskDetails('1');" onBlur="task_update('1');$('#taskline-1').removeClass('taskline-active');" onkeyup="$('#task-text-info').html(this.value);"/>
      </div>
    </div>

    <div class="taskline col-md-12" id="taskline-2" onmouseover="$('#expand-2').addClass('taskline-button-gray');" onmouseout="$('#expand-2').removeClass('taskline-button-gray');">
        <span class="taskline-checkbox-complete" id="task-checkbox-2" title="Reopen this task." onClick="task_open('1');"></span>
        <div class="btn-group task-btn-group">
          <button data-toggle="dropdown" class="btn btn-2 dropdown-toggle task-priority-tag" title="Change task priority." type="button"><span class="caret" style="margin-top:-7px;"></span></button>
          <ul class="dropdown-menu task-priority-list">
            <li><a href="{!! URL::to('tasks/priority/3/') !!}"><span class="label label-danger">High Priority</span></a></li>
            <li><a href="{!! URL::to('tasks/priority/2/') !!}"><span class="label label-warning">Medium Priority</span></a></li>
            <li><a href="{!! URL::to('tasks/priority/1/') !!}"><span class="label label-info">Low Priority</span></a></li>
          </ul>
        </div>
      <div class="taskline-input-wrapper">
        <span id="task-date-2" class="task_date">Jan 1</span>
        <input type="text" class="form-control taskline-input strike" id="task-text-2" value="Sample task 2" onFocus="$('#taskline-2').addClass('taskline-active');taskDetails('1');" onBlur="task_update('1');$('#taskline-2').removeClass('taskline-active');" onkeyup="$('#task-text-info').html(this.value);"/>
      </div>
    </div>
    
  </div>
@endsection