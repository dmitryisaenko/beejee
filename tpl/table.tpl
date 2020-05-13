
<div class="container-fluid">
   <div class="row d-flex justify-content-center">
      <div class="col-lg-10">
         <div id="mes-edit"></div>
         <table id="table_list" class="table table-hover  table-striped">
            <thead class="thead-dark">
               <tr>
                  <th class="user_name">Имя пользователя<br><a href="?sortby=user_name&sort=asc">Возр.</a> - <a href="?sortby=user_name&sort=desc">Убыв.</a></th>
                  <th class="user_email">Email<br><a href="?sortby=user_email&sort=asc">Возр.</a> - <a href="?sortby=user_email&sort=desc">Убыв.</a></th>
                  <th class="user_content">Задача</th>
                  <th class="user_status">Статус<br><a href="?sortby=task_done&sort=asc">Возр.</a> - <a href="?sortby=task_done&sort=desc">Убыв.</a></th>
               </tr>
            </thead>
            <tbody>
               %TABLE-ROWS%
            </tbody>
         </table>
         %PAGINATION%
      </div>
   

   </div>

</div>