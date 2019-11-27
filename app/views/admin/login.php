
<div class="card login-card" style="max-width: 400px;" >
    <form  action='login'  method='post'>
        <div class="card-header">
            <h5>Вход в панель Администратора</h5>
        </div>
        <div class="card-body">     
            <div class="w-100 text-center d-none" id='validate-account'><small class="text-danger"><?=htmlspecialchars($account['message'],ENT_QUOTES)?></small></div>    
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" name='login' class="form-control" id="login">
                <small id='validate-login' class='d-none text-danger'><?=htmlspecialchars($login['message'],ENT_QUOTES)?></small>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name='password' class="form-control" id="password" >
                <small id='validate-password' class='d-none text-danger'><?=htmlspecialchars($password['message'],ENT_QUOTES)?></small>
            </div>               
            <button type="submit"  class="btn btn-primary w-100">Войти</button>         
        </div> 
    </form>  
</div>
      
  
   
