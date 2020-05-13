<!-- Modal -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form action="/auth" method="POST">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               %MODAL-ERROR%
               <div class="form-group">
                  <input name="login" class="form-control form-control-lg" type="text" placeholder="Логин" value="%LOGIN%">
               </div>
               <div class="form-group">
                  <input name="password" class="form-control form-control-lg" type="text" placeholder="Пароль" value="%PASSWORD%">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
               <button type="submit" class="btn btn-dark" name="loginBtn" value="OK">Войти</button>
            </div>
         </form>
      </div>
   </div>
</div>

