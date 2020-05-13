<div class="container-fluid">
   <div class="row">
      <div class="col-4 offset-1">
         <h2 class="ml-3">%TITLE%</h2>
         %ERROR-EMPTY%
         %ERROR-EMAIL%
         <form action="/task/%TASK-ACTION%" method="POST">
            <div class="modal-body">
               
               <div class="form-group">
                  <input name="user_name" class="form-control form-control-lg" type="text" placeholder="Имя" value="%USER-NAME%">
               </div>
               <div class="form-group">
                  <input name="user_email" class="form-control form-control-lg" type="text" placeholder="Email" value="%USER-EMAIL%">
               </div>
               <div class="form-group">
                  <textarea name="user_task" class="form-control form-control-lg" type="text" rows="5" placeholder="Задача">%TASK%</textarea>
               </div>
               %HIDDEN-INPUT%
               <h6>Все поля обязательны к заполнению!</h6>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-dark" name="addTaskBtn" value="OK">Сохранить задачу</button>
            </div>
         </form>
      </div>
   </div>
</div>