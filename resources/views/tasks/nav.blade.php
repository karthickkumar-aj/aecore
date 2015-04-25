<ul class="sidebar-nav">
  <!-- USER LISTS -->
  <li class="nav-header"><span class="glyphicon glyphicon-list"></span> My Lists</li>
  <li>{!! link_to('tasks', 'All Tasks', array('class'=>(Request::is('tasks') ? 'active' : '') )) !!}</li>
  <li><a href="">Example 1</a></li>
  <li><a href="">Example 2</a></li>
  <li><a href="">Example 3</a></li>
  
  <!-- FOLLOWING -->
  <br>
  <li class="nav-header"><span class="glyphicon glyphicon-eye-open"></span> Following</li>
  <li><a href=""><img src="{!! Auth::user()->gravatar !!}" class="avatar_xs" />{!! Auth::User()->name !!}</a></li>
  <li><a href=""><img src="{!! Auth::user()->gravatar !!}" class="avatar_xs" />John Doe1</a></li>
  <li><a href=""><img src="{!! Auth::user()->gravatar !!}" class="avatar_xs" />John Doe2</a></li>
</ul>