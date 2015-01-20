<?php 
$success = Session::get('success', -1); 
$name = Auth::check() ? Auth::user()->username : 'Гость';
?>
@if ($success === 1) 
<div class="alert alert-dismissible alert-success" role="alert">Вы успешно авторизировались</div>
@elseif ($success === 0)
<div class="alert alert-dismissible alert-danger" role="alert">Некорректный логин или пароль</div>
@endif
<div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="/">{{Config::get('constants.title')}} </a>
          </div>
            
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Платежи<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                  <li>{{ HTML::link('payment/show', 'Показать')}}</li>
                  <li class="divider"></li>
                  <li>{{ HTML::link('payment/addForm', 'Добавить')}}</li>
                </ul>
              </li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Виды платежей<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                  <li>{{ HTML::link('paytype/show', 'Показать')}}</li>
                  <li class="divider"></li>
                  <li>{{ HTML::link('paytype/addForm', 'Добавить')}}</li>
                </ul>
              </li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Участники<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                  <li>{{ HTML::link('user/show', 'Показать')}}</li>
                  <li class="divider"></li>
                  <li>{{ HTML::link('user/addForm', 'Добавить')}}</li>
                </ul>
              </li>
              <li>{{ HTML::link('#', 'Статистика')}}</li>
            </ul>
              <p class="navbar-text navbar-right">
              <?php if (Auth::check()) : 
                echo HTML::link(
                        'user/addForm/' . Auth::user()->id, 
                        " " . Auth::user()->username, 
                        ['class' => 'glyphicon glyphicon-user navbar-link', 'title' => "Профиль"]
                        );
                echo HTML::link(
                        'user/logout',
                        "" , 
                        ['class' => 'glyphicon glyphicon-off navbar-link', 'title' => "Выйти"]
                        );
              else :
                echo HTML::link('#', 
                        ' Гость',
                        ['class' => 'glyphicon glyphicon-user navbar-link', 'title' => "Войти", 'data-toggle'=> "modal", 'data-target'=>"#myModal"]
                        );
              endif; ?>
              </p>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->