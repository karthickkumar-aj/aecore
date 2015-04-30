<div class="panel panel-default">
  <div class="panel-heading">Personal Settings</div>
  <div class="list-group">
    <a href="/settings/profile" class="list-group-item {!! (Request::is('*profile') ? 'selected' : '') !!}"><span class="glyphicon glyphicon-user small"></span> Profile</a>
    <a href="/settings/account" class="list-group-item {!! (Request::is('*account') ? 'selected' : '') !!}"><span class="glyphicon glyphicon-cog small"></span> Account</a>
    <!--<a href="/settings/notifications" class="list-group-item {!! (Request::is('*notifications') ? 'selected' : '') !!}">Notifications</a>-->
  </div>
</div>

@if(Auth::user()->company_user_access == 'admin' && Auth::user()->company_user_status == 'active')
  <div class="panel panel-default">
    <div class="panel-heading">Company Settings</div>
    <div class="list-group">
      <a href="/settings/company" class="list-group-item {!! (Request::is('*company') ? 'selected' : '') !!}"><span class="glyphicon glyphicon-flag small"></span> About {!! Session::get('company_name') !!}</a>
      <a href="/settings/company/preferences" class="list-group-item {!! (Request::is('*company/preferences') ? 'selected' : '') !!}"><span class="glyphicon glyphicon-tasks small"></span> Preferences</a>
      <a href="/settings/company/users" class="list-group-item {!! (Request::is('*company/users') ? 'selected' : '') !!}"><span class="glyphicon glyphicon-briefcase small"></span> Employees / Users</a>
    </div>
  </div>
@endif