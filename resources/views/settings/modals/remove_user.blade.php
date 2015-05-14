<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title">Remove User</h4>
</div>
{!! Form::open(array('url' => '/settings/company/remove', 'method' => 'post', 'class' => 'form-horizontal')) !!}
  <div class="modal-body">
    {!! '<p>Are you sure you want to remove <strong>' . $user->name . '</strong> from ' . Auth::User()->Company->name . '? This user will no longer have access to any projects or data associated with your company.</p>' !!}
    <div class="form-group no-margin">
      <div class="col-sm-12">
        <p>Type <strong>REMOVE</strong> in the following box:</p>
         {!! Form::text('remove', null, array('class' => 'form-control', 'placeholder' => 'Type "REMOVE" here...', 'required'=>'true', 'autofocus'=>'true')) !!}
      </div>
    </div>
  </div>
  <div class="modal-footer" style="margin:0;">
    <button type="submit" class="btn btn-danger" title="Remove user."><span class="glyphicon glyphicon-trash"></span> Remove</button>
    <button type="button" class="btn btn-default btn-spacer-left" data-dismiss="modal" title="Cancel & close modal window.">Cancel</button>
  </div>
  <input type="hidden" name="name" value="{{ $user->name }}" />
  <input type="hidden" name="usercode" value="{{ $user->usercode }}" />
{!! Form::close() !!}