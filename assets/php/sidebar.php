<nav class="sidebar">
        <div class="sidebar__header">
          <div class="avatar">  
            <img
                class="avatar__img"
                <?php 
                   if (empty($userAvatar)){
                     echo '
                      src="/assets/avatars/avatar.png"
                      alt="'.$userName.'"
                     ';
                   } else {
                     echo '
                      src="/assets/avatars/'.$userLogin.'/'.$userAvatar.'"
                      alt="'.$userName.'"
                     ';
                   }
                ?>
            />
          </div>
        </div>
        <div class="sidebar__content">
          <ul class="menu-list">
            <li class="menu-list__item">
              <a href="/" class="menu-list__link">Главная</a>
            </li>
            <?php 
              if ($userRights == "Модератор" || $userRights == "Администратор"){
                echo '
                <li class="menu-list__item">
                  <a href="/mytest" class="menu-list__link">Мои тесты</a>
                </li>
                ';
              }
            ?>
            <li class="menu-list__item">
              <a href="/passed" class="menu-list__link">Пройденные тесты</a>
            </li>
            <li class="menu-list__item">
              <a href="/profile" class="menu-list__link">Профиль</a>
            </li>
            <li class="menu-list__item">
              <a href="/auth/logout.php" class="menu-list__link">Выйти</a>
            </li>
          </ul>
        </div>
</nav>