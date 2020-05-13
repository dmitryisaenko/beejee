
<div class="container-fluid">
   <div class="row d-flex justify-content-center">
      <div class="col-lg-10">
         <div id="mes-edit"></div>
         <table id="table_list" class="table table-hover  table-striped">
            <thead class="thead-dark">
               <tr>
                  <th class="user_name">Имя пользователя<span><a href="?sortby=user_name&sort=asc&page=%PAGENUMBER%" title="Сортровать по возрастанию"><i class="fas fa-arrow-alt-circle-up"></i></a><a href="?sortby=user_name&sort=desc&page=%PAGENUMBER%" title="Сортровать по убыванию"><i class="fas fa-arrow-alt-circle-down"></i></a></span></th>
                  <th class="user_email">Email<span><a href="?sortby=user_email&sort=asc&page=%PAGENUMBER%" title="Сортровать по возрастанию"><i class="fas fa-arrow-alt-circle-up"></i></a><a href="?sortby=user_email&sort=desc&page=%PAGENUMBER%" title="Сортровать по убыванию"><i class="fas fa-arrow-alt-circle-down"></i></a></span></th>
                  <th class="user_content">Задача</th>
                  <th class="user_status">Статус<span><a href="?sortby=task_done&sort=asc&page=%PAGENUMBER%" title="Сортровать по возрастанию"><span><i class="fas fa-arrow-alt-circle-up"></i></a><a href="?sortby=task_done&sort=desc&page=%PAGENUMBER%" title="Сортровать по убыванию"><i class="fas fa-arrow-alt-circle-down"></i></a></span></th>
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