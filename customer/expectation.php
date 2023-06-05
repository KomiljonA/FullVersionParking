<?php
$pageTitle = "Ожидание";
require'template/header.php';
?>
<body>
        <div>
        </div>
    <!--Добавляем верзнее меню-->
    <?php 
    $pageName = "Ожидание";
    require 'template/main.php';
    ?>  
            
            <div id="col-ss">
                <div class="col-sr">
                  <ul id="paginated-list" data-current-page="1" aria-live="polite" class="paginat">
                    <li class="header_item" data-tab="tab-1"><a href="#" class="aas">
                        <div class="namedd">
                            <h6 class="title1">Парковка</h6>
                        </div>
                    </a></li>
                    <li class="header_item" data-tab="tab-2"><a href="#" class="aas">
                        <div class="namedd">
                            <h6 class="title1">Зарядка</h6>
                        </div>
                      </a></li>
                  </ul>
                </div>    
            </div>
                           <!--123-->
             <div class="pagescontrol">
                 <!--1-я вкладка-->
                
                <div class="main_content hidden" id="tab-1">
                    <div class="cl-os">
                       <div class="sat-1">
                            <p>Оплата за парковку <br><txt class="2en">ул. Мирзо Турсунзаде, 18/6</txt></p>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                 <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="open-popup" data-popup-id="popup-1">Подробнее</button>
                                <button>Оплатить</button>
                            </div>
                            <p class="plo">11 февраля 2023 в 12:43</p>
                        </div>

                        <div class="sat-1">
                            <p>Оплата за парковку <br><txt class="2en">ул. Ленина, 5</txt></p>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                 <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="open-popup" data-popup-id="popup-2">Подробнее</button>
                                <button>Оплатить</button>
                            </div>
                            <p class="plo">10 февраля 2023 в 18:30</p>
                        </div>
                        <div class="sat-1">
                            <p>Оплата за парковку <br><txt class="2en">ул. Ленина, 5</txt></p>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="open-popup" data-popup-id="popup-3">Подробнее</button>
                                <button>Оплатить</button>
                            </div>
                            <p class="plo">10 февраля 2023 в 18:30</p>
                        </div>
                        <div class="sat-1">
                            <p>Оплата за парковку <br><txt class="2en">ул. Ленина, 5</txt></p>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="open-popup" data-popup-id="popup-4">Подробнее</button>
                                <button>Оплатить</button>
                            </div>
                            <p class="plo">10 февраля 2023 в 18:30</p>
                        </div>
                        
                        <!--вскрывает окна-->
                        
                        <!--Заполнение попапов-->
                        <div id="popup-container">
                            <div class="popup" id="popup-1">
                                <h2>Штраф<button class="close-popup">+</button></h2>
                                <div class="sat-1">
                            <p class="pop">Оплата за парковку <br><txt class="2en">ул. 332, 5</txt></p>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                 <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="pob">Оплатить</button>
                            </div>
                        </div>
                                
                            </div>
                            <div class="popup" id="popup-2">
                                <h2><button class="close-popup">+</button>Штраф</h2>
                                <div class="sat-1">
                            <p class="pop">Оплата за парковку <br><txt class="2en">ул. 332, 5</txt></p>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                 <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="pob">Оплатить</button>
                            </div>
                        </div>
                            </div>
                            <div class="popup" id="popup-3">
                               <h2><button class="close-popup">+</button>Штраф</h2>
                                <div class="sat-1">
                            <p class="pop">Оплата за парковку <br><txt class="2en">ул. 332, 5</txt></p>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="pob">Оплатить</button>
                            </div>
                        </div>
                            </div>
                            <div class="popup" id="popup-4">
                                <h2><button class="close-popup">+</button>Штраф</h2>
                                <div class="sat-1">
                            <p class="pop">Оплата за парковку <br><txt class="2en">ул. 332, 5</txt></p>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                 <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="pob">Оплатить</button>
                            </div>
                        </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
                
                
                <!--2-я вкладка-->
                <div class="main_content hidden" id="tab-2">
                    <div class="cl-os">
                        <div class="sat-1">
                            <p>Оплата за зарядку <br><txt class="2en">ул. Ленина, 5</txt></p>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="open-popup" data-popup-id="popup-11">Подробнее</button>
                                <button>Оплатить</button>
                            </div>
                            <p class="plo">10 февраля 2023 в 18:30</p>
                        </div>
                        <div class="sat-1">
                            <p>Оплата за зарядку <br><txt class="2en">ул. Ленина, 5</txt></p>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="open-popup" data-popup-id="popup-12">Подробнее</button>
                                <button>Оплатить</button>
                            </div>
                            <p class="plo">10 февраля 2023 в 18:30</p>
                        </div>
                        <div class="sat-1">
                            <p>Оплата за зарядку <br><txt class="2en">ул. Ленина, 5</txt></p>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                 <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="open-popup" data-popup-id="popup-13">Подробнее</button>
                                <button>Оплатить</button>
                            </div>
                            <p class="plo">10 февраля 2023 в 18:30</p>
                        </div>
                        <!--Заполнение попапов-->
                        <div id="popup-container">
                            
                            <div class="popup" id="popup-11">
                                <h2>Штраф</h2>
                                <div class="sat-1">
                            <p class="pop">Оплата за зарядку <br><txt class="2en">ул. 332, 5</txt></p>
                            <div class="cl-tt">
                                <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                 <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="pob">Оплатить</button>
                            </div>
                        </div>
                                
                            </div>
                            <div class="popup" id="popup-12">
                                <h2>Штраф</h2>
                                <div class="sat-1">
                            <p class="pop">Оплата за зарядку <br><txt class="2en">ул. 332, 5</txt></p>
                            <div class="cl-tt">
                               <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                 <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="pob">Оплатить</button>
                            </div>
                        </div>
                            </div>
                            <div class="popup" id="popup-13">
                                <h2>Штраф</h2>
                                <div class="sat-1">
                            <p class="pop">Оплата за зарядку <br><txt class="2en">ул. 332, 5</txt></p>
                            <div class="cl-tt">
                               <p class="opl">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                К оплате</p>
                                <p class="lpo">86 сом</p>
                            </div>
                            <div class="cl-tt">
                                 <p class="opl">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    Машина</p>
                                <p class="lpo">1234хх01</p>
                            </div>
                            <div class="but22">
                                <button class="pob">Оплатить</button>
                            </div>
                        </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                 
            </div>
    <!--Затемнение заднего фона попапов-->    
    <div id="overlay"></div>
    
    
    
    
    <!--Добавляем Footer-->
    <?php require 'template/footer.php'?>
</body>
</html>
