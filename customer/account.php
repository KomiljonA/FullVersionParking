<?php
$pageTitle = "Профиль";
require 'template/header.php';
?>
<body style="background: #E5E5E5;">
    <?php 
    $pageName = "Аккаунт";
    require 'template/main.php';
    ?>  
         <div id="col-ss">
                <div class="col-sr">
                  <ul id="paginated-list" data-current-page="1" aria-live="polite" class="paginat">
                    <li class="header_item" data-tab="tab-1">
                        <a href="#" class="aas">
                            <div class="namedd">
                                <h6 class="title1">Аккаунт</h6>
                            </div>
                        </a>
                    </li>
                    <li class="header_item" data-tab="tab-2">
                        <a href="#" class="aas">
                            <div class="namedd">
                                <h6 class="title1">Ожидание</h6>
                            </div>
                        </a>
                    </li>
                    <li class="header_item" data-tab="tab-3">
                        <a href="#" class="aas">
                            <div class="namedd">
                                <h6 class="title1">Штрафы</h6>
                            </div>
                        </a>
                    </li>
                    <li class="header_item" data-tab="tab-4">
                        <a href="#" class="aas">
                            <div class="namedd">
                                <h6 class="title1">История</h6>
                            </div>
                        </a>
                    </li>
                  </ul>
                </div>    
            </div>
                <!--Пагинация-->
             <div class="pagescontrol">

                <!--Страница Профиль-->
                <div class="main_content hidden" id="tab-1">
                    <div class="cl-os">
                       <div class="sat-1 cl-sat">
                            <p class="prof">Мой профиль</p>
                            <div class="fio">Abilov Abil<br>
                            <tet>+992 90 100 00-74</tet></div>
                            <button class="call" onclick="if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) { window.location.href='tel:3366'; } else { alert('Вы можете связаться с поддержкой по номеру: 3366'); }">Связаться с поддержкой</button><!--Если это телефон, он перенаправляет на звонок, если нет, то получаем уведомление по какому номеру можно связаться с нами-->
                            <form action="logout.php" method="post">
                              <button type="submit" class="logout">Выйти</button>
                            </form>
                            <a href="#" class="politic">Правила пользования сервисом</a>
                        </div>
                        
                        
                        <div class="sat-1">
                            <p class="prof">Автомобили</p>
                             <div id="car-list">

                             </div>
                            <button id="add-car-btn" class="add-btn">Добавить</button>

                            <div id="add-car-modal" class="modal">
                              <div class="modal-content">
                                <span class="close">&times;</span>
                                <form id="car-form">
                                  <label class="cl-lb">Введите машину</label><br>
                                  <label for="photo">
                                      <img src="images/add.svg" alt="Add Photo">
                                  </label>
                                  <input type="file" id="photo" accept="image/*"  style="display: none;">
                                  <br>
                                  <label class="ca-nm" for="number">Номер машины:</label><br>
                                  <input class="inp-num" type="text" placeholder="0000XX00" id="car-number" pattern="[0-9]{3,4}[A-Z]{2}[0-9]{2}" >

                                  <br>
                                  <label class="ca-nm" for="passport">Серия техпаспорта:</label><br>
                                  <input type="text" placeholder="0000*" id="passport" required>
                                  <br>
                                  <button class="en-bn" type="submit">Завершить</button>
                                </form>
                              </div>
                            </div>
                        </div>
                        <div class="sat-1">
                            <p class="prof">Мои карты</p>
                        </div> 
                    </div>
                </div>
                <!--Страница Ожидание-->
                    <div class="main_content hidden" id="tab-2">
                        <!-- Прелоудер -->
                        <div id="loading-spinner"></div>
                        <div class="cl-os" id="my-cl-os3"></div>
                    </div>

                    <!--Страница Штрафы-->
                    <div class="main_content hidden" id="tab-3">
                        <!-- Прелоудер -->
                        <div id="loading-spinner2"></div>
                        <div class="cl-os" id="my-cl-os2"></div>
                    </div>

                    <!--Страница История-->
                    <div class="main_content hidden" id="tab-4">
                        <!-- Прелоудер -->
                        <div id="loading-spinner3"></div>
                        <div class="cl-os" id="my-cl-os"></div>
                    </div>
                <!--Страницы закончили-->
            </div>      
    <!--Добавляем Footer-->
    <?php require 'template/footer.php'?>
</body>
</html>
