@extends('app')

@section('content')
<!-- start of list top bar -->
 <div class="container-fluid">
      <div class="row wrapper">
    <div class="col-md-6">
      <h1 class="m-n">Project List <small> (22 Total)</small></h3>
      <p>Create and Manange your projects</p>
    </div>
    <div class="col-md-6">
      <div class="btn-toolbar" role="toolbar" aria-label="...">
      <button type="button" class="btn btn-default btn-success pull-right">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Project
      </button>
      <div class="btn-group pull-right" role="group" aria-label="...">
          <button type="button" class="btn btn-default">Summary View</button>
          <button type="button" class="btn btn-default">Grid View</button>
          <button type="button" class="btn btn-default">List View</button>
      </div>
    </div>
    </div>
    </div>
 </div>

 <!-- start block for side filter panel -->
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">
          @include ('partial/project_filter')
        </div>
      </div>
		</div>
<!-- end block for side filter panel -->
		<div class="col-sm-9">
      <div class="panel panel-default">
          <div class="panel-body">
          <div class="row">
          <div class="btn-toolbar" role="toolbar" aria-label="...">
              <!-- Print button -->
              <button type="button" class="btn btn-default pull-right"  aria-label="Print" style="margin-right:30px">
                  <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print
              </button>
              <!-- Split button -->
              <div class="btn-group pull-right">
                <button type="button" class="btn btn-default">Sort</button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Newest</a></li>
                  <li><a href="#">Oldest</a></li>
                </ul>
              </div>
              <!-- Split button -->
              <div class="btn-group pull-right">
                <button type="button" class="btn btn-default">Export</button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Excel</a></li>
                  <li><a href="#">PDF</a></li>
                  <li><a href="#">JSON</a></li>

                </ul>
              </div>

          </div>
        <div class="row">
          <div class="panel-body">
            @include('partial.project_list_data_grid')
        </div>
        </div>
  </div>
</div>
		</div>
	</div>
</div>
@endsection
