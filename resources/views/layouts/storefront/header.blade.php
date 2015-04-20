<script type="text/javascript">
  $(function(){
    $('[data-toggle="tooltip"]').tooltip()
  });
</script>

<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      @if (Auth::check())
        {!! link_to('projects', '', array('class' => 'navbar-brand')) !!}
      @else
        {!! link_to('home', '', array('class' => 'navbar-brand')) !!}
      @endif
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
          <li>{!! link_to('auth/logout', 'Log Out', array('class' => 'navbar-link')) !!}</li>
        @else
          <li>{!! link_to('signup', 'Sign Up', array('class' => Request::is('signup') ? 'navbar-link-active' : 'navbar-link', 'title'=>'It\'s Easy!', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom')) !!}</li>
          <li>{!! link_to('login', 'Log In', array('class' => Request::is('login') ? 'navbar-link-active' : 'navbar-link')) !!}</li>
        @endif
      </ul>
    </div>
  </div>
</nav>