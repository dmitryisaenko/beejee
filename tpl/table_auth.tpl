<div class="container-fluid">
   <div class="row d-flex justify-content-center">
      <div class="col-lg-10">
         <table id="table_list" class="table table-hover  table-striped">
            <thead class="thead-dark">
               <tr>
                  <th class="user_name">Имя пользователя</th>
                  <th class="user_email">Email</th>
                  <th class="user_content">Задача</th>
                  <th class="user_status">Статус</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                 <td class="align-middle">Иванов И.И.</td>
                 <td class="align-middle">ivanov@gmail.com</td>
                 <td class="align-middle">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni, dolore sunt explicabo deleniti voluptas rem. Quia, sit totam iste perferendis voluptatem ipsam quas vel corrupti, expedita necessitatibus odio aliquam incidunt!</td>
                 <td class="align-middle">
                    <a href="edit_task.html" class="btn btn-dark edit-btn">Редактировать</a>
               </td>
               </tr>
               <tr>
                  <td class="align-middle">Иванов И.И.</td>
                  <td class="align-middle">ivanov@gmail.com</td>
                  <td class="align-middle">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni, dolore sunt explicabo deleniti voluptas rem. Quia, sit totam iste perferendis voluptatem ipsam quas vel corrupti, expedita necessitatibus odio aliquam incidunt!</td>
                  <td class="align-middle">
                     <div class="task-done">Выполнено</div>
                     <a href="edit_task.html" class="btn btn-dark edit-btn">Редактировать</a>
                  </td>
                </tr>
                <tr>
                  <td class="align-middle">Иванов И.И.</td>
                  <td class="align-middle">ivanov@gmail.com</td>
                  <td class="align-middle">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni, dolore sunt explicabo deleniti voluptas rem. Quia, sit totam iste perferendis voluptatem ipsam quas vel corrupti, expedita necessitatibus odio aliquam incidunt!</td>
                  <td class="align-middle">
                     <div class="task-done">Выполнено</div>
                     <div class="admin-text">
                        <span>Отредактировано</span>:
                        <p>Admin, 12.05.2020 в 15.02</p>
                     </div>
                     <a href="edit_task.html" class="btn btn-dark edit-btn">Редактировать</a>
                  </td>
                </tr>
            </tbody>
         </table>
      </div>
   

      <nav id="pagination" aria-label="Page navigation example">
         <ul class="pagination justify-content-end">
            <li class="page-item disabled">
               <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Назад</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
               <a class="page-link" href="#">Вперед</a>
            </li>
         </ul>
      </nav>
   </div>

</div>