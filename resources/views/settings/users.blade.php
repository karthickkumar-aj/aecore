@extends('layouts.application.main')
@section('content')

  <div class="pagehead">
    <h1>Settings / Company / Users</h1>
  </div>
      
  <div class="row">
    <div class="col-sm-4 col-md-3">
      @include('settings.nav')
    </div>
    <div class="col-sm-8 col-md-9">  
      @if(Session::has('UpdateSuccess'))
        <script type="text/javascript" charset="utf-8">
          setTimeout(function() {
            $("#deletesuccess").fadeOut("slow");
          }, 2500);
        </script>
        <div class="alert alert-success" id="deletesuccess"><span class="glyphicon glyphicon-ok"></span> {!! Session::get('UpdateSuccess') !!}</div>
      @endif
      <div class="panel panel-default">
        <div class="panel-heading">Users</div>
        <div class="panel-body">
          @foreach($userlist as $user)
            <div class="user-list col-md-6" <?php if($user->id != Auth::User()->id) { ?> onMouseOver="$('#user_settings_<?php echo $user->id; ?>').show();" onMouseOut="$('#user_settings_<?php echo $user->id; ?>').hide();" <?php } ?> >
              <div class="btn-group pull-right" id="user_settings_{!! $user->id !!}" style="margin-top:5px;display:none;">
                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                  <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/settings/company/remove/{!! $user->usercode !!}" data-target="#modal" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Remove User</a></li>
                  @if($user->company_user_access != 'admin')
                  <li><a href="/settings/company/admin/{!! $user->usercode !!}"><span class="glyphicon glyphicon-tower"></span> Make Admin</a></li>
                  @endif
                </ul>
              </div>
              <img src="{!! $user->gravatar !!}" class="avatar_md" />
              <p class="bold">{!! $user->name !!} @if($user->company_user_access == 'admin') {!! '<span class="small text-muted">(Admin)</span>' !!} @endif</p>
              <p class="small text-muted">{!! link_to('/p/'.$user->username, '@'.$user->username, array('class' => 'btn-link')) !!}  {!! ' ' . $user->title !!}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@stop