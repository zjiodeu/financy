  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Авторизируйтесь</h4>
      </div>
      <div class="modal-body">
        {{Form::open(['url' => 'user/auth'])}}
        <div class="form-group">
        <?php
            $message = Session::get('message');
         if ($message) :
             echo "<div class='alert alert-danger alert-dismissible' role='alert'>{$message} </div>";
         endif;
        ?>
        {{Form::label('username', 'Логин')}}
        {{Form::text('username', null, ['class' => 'form-control'])}}
        {{Form::label('password', 'Пароль')}}
        {{Form::password('password',  ['class' => 'form-control'])}}
        </div>
      </div>
      <div class="modal-footer">
        {{Form::submit('Войти', ['class' => 'btn btn-primary'])}}
        {{Form::button('Закрыть', ['class' => 'btn btn-default', 'data-dismiss' => "modal"])}}
      </div>
        {{Form::close()}}
    </div>
  </div>
</div>