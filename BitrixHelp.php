<!-- =============================================================== BITRIX ============================================================================ -->

<!-- ======================================================== РАБОТА ПОД АДМИНОМ ========================================================================= -->

<?
global $USER;
if ($USER->IsAdmin()) {?>
   <!-- Здесь пишем код -->
<? } ?>

<!-- ======================================================== ЛОГОТИП, ССЫЛКИ ================================================================================================ -->

Ссылка на основной домен сайта - <?=SITE_DIR?>
<a href="<?=SITE_DIR?>" class="header__logo logo-icon"></a>

<!-- ======================================================== ПОДКЛЮЧЕНИЯ, title ========================================================================= -->

Тайтл как и ряд другой информации выводится с помощью глобального обьекта $APPLICATION. 
У него есть метод ShowTitle().
<title><? $APPLICATION->ShowTitle() ?></title>

<!-- ======================================================== ПОДКЛЮЧЕНИЯ, СТИЛИ И СКРИПТЫ ========================================================================= -->

Для подключения стилей и скриптов, используется специальный класс Asset.
Импортируем пространство имен класса Asset. Класс используется для подключения стилей и скриптов.
<?
use Bitrix\Main\Page\Asset;
?>
Используем метод getInstance. У него есть 3 метода, addString, addJs и addCss. Для подключения стилей, скриптов и подключения каких то строк. 
Например, viewport.
addCss() в скобочках необходимо указать путь, к папке с активной темой. Для этого используется специальная константа 
Asset::getInstance()->adCss(SITE_TEMPLATE_PATH . '');
Константа возвращает путь к активной папке, без концевого слеша. То есть, это будет local/templates/наша тема. И соответсвенно нам нужно продолжить путь слешом
Asset::getInstance()->adCss(SITE_TEMPLATE_PATH . '/css/style.min.css');
Подключаем ниже title конструкцию
<?
	Asset::getInstance()->adCss(SITE_TEMPLATE_PATH . '/css/style.min.css');
   Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/app.js');
?>
Bitirx позволяет подключать библиотеку jquerry и ряд других библиотек из ядра bitrix.
Подключение библиотеки из ядра bitirx. 
CJSCORE и его метод Init(). И далее мы в виде массива указываем набор библиотек которые нам необходимо подключить.
CJSCORE::Init(['jquerry']);

<!-- ======================================================== ПОДКЛЮЧЕНИЯ, viewport и шрифтов из googlefonts ========================================================================= -->

<?
Asset::getInstance()->addString ('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
Asset::getInstance()->addString ('<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">');
?>

<!-- ======================================================== ПОДКЛЮЧЕНИЯ, КОДИРОВКИ ========================================================================= -->

Для вывода кодировки используется метод ShowHead()
<? $APPLICATION->ShowHead() ?>

<!-- ======================================================== ПОДКЛЮЧЕНИЯ, КАРТИНКИ ========================================================================= -->

Выводим в теге img 
<picture>
	<source srcset="<?=SITE_TEMPLATE_PATH?>/img/team/04.webp" type="image/webp"><img src="<?=SITE_TEMPLATE_PATH?>/img/team/04.jpg?_v=1633466607061" alt="">
</picture>
<!-- ----------------------------------------------------------->

Вывод картинок в превью, для мобилки и пк из Админки 
<? if (!empty($link)) {?>
	<a href="<?=$link?>" class="banner-link">
<?}?>
		<picture class="banner-link__picture"> 
			<source srcset="<?=$item["PREVIEW_PICTURE"]["SRC"]?>" media="(max-width: 515px)" />
				<img <?if($counter_elem == 0){?>src<?}else{?>data-src<?}?>="<?=$item["DETAIL_PICTURE"]["SRC"]?>" <?if($counter_elem != 0){?> src="<?=$item["DETAIL_PICTURE"]["SRC"]?>" <?}?> alt="<?=$item["DETAIL_PICTURE"]["ALT"]?>" class="baner-slider__image <?if($counter_elem == 0){?><?}else{?>lazy<?}?>">
		</picture>
<? if (!empty($link)) {?>
	</a>
<?}?>
Вывод превью - ["PREVIEW_PICTURE"]["SRC"]
Вывод пк - ["DETAIL_PICTURE"]["SRC"]
<!-- ======================================================== ПОДКЛЮЧЕНИЯ, ADMIN-PANEL ========================================================================= -->

Для подключения админ-панели в теге body coздаем
<div id="panel"><? $APPLICATION->showPanel(); ?></div>
<!-- ======================================================== СКРИПТЫ ========================================================================= -->

Чтобы переместить файлы javscript в конец сайта нужно включить опцию Переместить весь Javascript в конец страницы в разделе 
Настройки>Настройки продукта>Настройки модулей>Главный модуль. Скриптам, которые должны остаться на месте, нужно прописать data-skip-moving="true".

<!-- ============================================================== СОЗДАНИЕ ДЕФОЛТНОЙ ТЕМЫ ========================================================================================== -->

В папке template создаем папку .default и переносим все файлы туда
В папке php_interface создаем файл init.php. И происываем там название намшей днфолтной константы и путь к дефолтной папке.
Там же пишем функцию для удобной распечатки массивов, обьектов и любой другой информации.

<? 
	define('DEFAULT_TEMPLATE_PATH', '/local/templates/default');

// Функция для удобной распечатки массивов, обьектов и любой другой информации 
	function debug ($data) {
		echo '<pre>' . print_r($data, return:1) . '</pre>';
	}

?>

<!-- ======================================================== КОМПОНЕНТЫ ========================================================================================= -->

Если нужно что то вывести, например меню, список статей, либо список категорий, то нам необходимо вместо например списка статей, вызвать ккой нибудь компонент. 
Настроить его, скопирповать шаблон, и поправить этот шаблон согласно нашей верстке. И мы получим динамичный вывод контента в битриксе. 

<!-- ======================================================== ИНФОБЛОКИ ========================================================================================= -->

Инфоблоки, они же информационные блоки. В терминологии битрикса инфоблоки это группировка для контента. Информационная единица. Блок для контента. 


<!-- ======================================================== ПОИСК В КОМПОНЕНТЕ ================================================================================= -->

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Медицинский центр №1");
$APPLICATION->SetPageProperty("description", "Официальный сайт клиники 'Медицинский центр №1' в Курске: все виды медицинских услуг для взрослых и детей, эффективная диагностика и лечение заболеваний, услуги косметологии, профосмотры и справки");
$APPLICATION->SetPageProperty("title", "Медицинский центр №1 в Курске: официальный сайт клиники");
$APPLICATION->SetTitle("Медицинский центр №1");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news.list", //Компонент news.list. Пространство имен bitrix.
	"Banners", // Шаблон компонента Banners. 
	Array( // Параметры компонента
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "Banners",
))?>
<!-- ===================================================================================================================================================== -->

1. Функция подключения компонента
<? $APPLICATION->IncludeComponent(
   componentName, // имя компонента
   componentTemplate, // шаблон компонента, пустая строка если шаблон по умолчанию
   arParams=array(), // параметры
   parentComponent=null,
   arFunctionParams=array()
); ?>

2. Включаемая область для раздела
<? $APPLICATION->IncludeComponent(
"bitrix:main.include",
"",
Array(
"AREA_FILE_SHOW" => "sect",
"AREA_FILE_SUFFIX" => "inc",
"AREA_FILE_RECURSIVE" => "Y",
"EDIT_MODE" => "html",
"EDIT_TEMPLATE" => "" //
),
false;) ?>

3.Включаемая область для страницы
<?$APPLICATION->IncludeComponent(
"bitrix:main.include",
"",
Array(
"AREA_FILE_SHOW" => "page",
"AREA_FILE_SUFFIX" => "inc",
"EDIT_MODE" => "html",
"EDIT_TEMPLATE" => ""
),
false
);?>

4.Включаемый файл шаблона
<?$APPLICATION->IncludeFile(
$APPLICATION->GetTemplatePath("file.php"),
Array(),
Array("MODE"=>"html")
);?>

5.Цепочка навигации
<?$APPLICATION->IncludeComponent(
"bitrix:breadcrumb",
"",
Array(
"START_FROM" => "0",
"PATH" => "",
"SITE_ID" => "-"
),
false
);?>

6.Горизонтальное меню
<?$APPLICATION->IncludeComponent(
"bitrix:menu",
"horizontal_multilevel",
array(
"ROOT_MENU_TYPE" => "left",
"MENU_CACHE_TYPE" => "N",
"MENU_CACHE_TIME" => "3600",
"MENU_CACHE_USE_GROUPS" => "Y",
"MENU_CACHE_GET_VARS" => array(),
"MAX_LEVEL" => "1",
"CHILD_MENU_TYPE" => "left",
"USE_EXT" => "N",
"ALLOW_MULTI_SELECT" => "N"
),
false
);?>

ROOT_MENU_TYPE – тип меню верхнего уровня
CHILD_MENU_TYPE – тип меню остальных уровней
MAX_LEVEL – максимальный уровень вложенности

7.Вертикальное меню
<?$APPLICATION->IncludeComponent(
"bitrix:menu",
"vertical_multilevel",
array(
"ROOT_MENU_TYPE" => "left",
"MENU_CACHE_TYPE" => "N",
"MENU_CACHE_TIME" => "3600",
"MENU_CACHE_USE_GROUPS" => "Y",
"MENU_CACHE_GET_VARS" => array(),
"MAX_LEVEL" => "1",
"CHILD_MENU_TYPE" => "left_child",
"USE_EXT" => "N",
"ALLOW_MULTI_SELECT" => "N"
),
false
);?>

8.Форма авторизации
<?$APPLICATION->IncludeComponent(
"bitrix:system.auth.form",
"",
Array(
"REGISTER_URL" => "",
"PROFILE_URL" => "",
"SHOW_ERRORS" => "N"
),
false
);?>

9.Форма поиска
<?$APPLICATION->IncludeComponent(
"bitrix:search.form",
"",
Array(
"PAGE" => "#SITE_DIR#search/index.php"
),
false
);?>

PAGE – путь к странице поиска

10.Список новостей
<?$APPLICATION->IncludeComponent(
"bitrix:news.list",
"",
Array(
"DISPLAY_DATE" => "Y",
"DISPLAY_NAME" => "Y",
"DISPLAY_PICTURE" => "Y",
"DISPLAY_PREVIEW_TEXT" => "Y",
"AJAX_MODE" => "N",
"IBLOCK_TYPE" => "news",
"IBLOCK_ID" => $_REQUEST["ID"],
"NEWS_COUNT" => "20",
"SORT_BY1" => "ACTIVE_FROM",
"SORT_ORDER1" => "DESC",
"SORT_BY2" => "SORT",
"SORT_ORDER2" => "ASC",
"FILTER_NAME" => "",
"FIELD_CODE" => "",
"PROPERTY_CODE" => "",
"CHECK_DATES" => "Y",
"DETAIL_URL" => "",
"PREVIEW_TRUNCATE_LEN" => "",
"ACTIVE_DATE_FORMAT" => "d.m.Y",
"DISPLAY_PANEL" => "N",
"SET_TITLE" => "Y",
"SET_STATUS_404" => "N",
"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
"ADD_SECTIONS_CHAIN" => "Y",
"HIDE_LINK_WHEN_NO_DETAIL" => "N",
"PARENT_SECTION" => "",
"PARENT_SECTION_CODE" => "",
"CACHE_TYPE" => "A",
"CACHE_TIME" => "3600",
"CACHE_FILTER" => "N",
"DISPLAY_TOP_PAGER" => "N",
"DISPLAY_BOTTOM_PAGER" => "Y",
"PAGER_TITLE" => "Новости",
"PAGER_SHOW_ALWAYS" => "Y",
"PAGER_TEMPLATE" => "",
"PAGER_DESC_NUMBERING" => "N",
"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
"PAGER_SHOW_ALL" => "Y",
"AJAX_OPTION_SHADOW" => "Y",
"AJAX_OPTION_JUMP" => "N",
"AJAX_OPTION_STYLE" => "Y",
"AJAX_OPTION_HISTORY" => "N",
"AJAX_OPTION_ADDITIONAL" => ""
),
false
);?>

DISPLAY_DATE – показывать дату (Y,N)
DISPLAY_NAME – показывать название (Y,N)
DISPLAY_PICTURE – показывать картинку анонса (Y,N)
DISPLAY_PREVIEW_TEXT – показывать анонс (Y,N)
NEWS_COUNT – количество выводимых новостей

11.Новостная лента
<?$APPLICATION->IncludeComponent(
"bitrix:news.line",
"",
Array(
"IBLOCK_TYPE" => "news",
"IBLOCKS" => "",
"NEWS_COUNT" => "20",
"FIELD_CODE" => "",
"SORT_BY1" => "ACTIVE_FROM",
"SORT_ORDER1" => "DESC",
"SORT_BY2" => "SORT",
"SORT_ORDER2" => "ASC",
"DETAIL_URL" => "",
"ACTIVE_DATE_FORMAT" => "d.m.Y",
"CACHE_TYPE" => "A",
"CACHE_TIME" => "300"
),
false
);?>

DETAIL_URL – путь к странице детального просмотра, по умолчанию берется из настроек инфоблока
NEWS_COUNT – количество выводимых новостей

12. Малая корзина
<?$APPLICATION->IncludeComponent(
"bitrix:sale.basket.basket.small",
"",
Array(
"PATH_TO_BASKET" => "/personal/basket.php",
"PATH_TO_ORDER" => "/personal/order.php"
),
false
);?>


12. Форма регистрации
<?$APPLICATION->IncludeComponent("bitrix:main.register","",Array(
"USER_PROPERTY_NAME" => "",
"SEF_MODE" => "Y",
"SHOW_FIELDS" => Array(),
"REQUIRED_FIELDS" => Array(),
"AUTH" => "Y",
"USE_BACKURL" => "Y",
"SUCCESS_PAGE" => "",
"SET_TITLE" => "Y",
"USER_PROPERTY" => Array(),
"SEF_FOLDER" => "/",
"VARIABLE_ALIASES" => Array()
)
);?>

13.Облако тегов
<?$APPLICATION->IncludeComponent("bitrix:search.tags.cloud","",Array(
		"FONT_MAX" => "50", 
		"FONT_MIN" => "10", 
		"COLOR_NEW" => "3E74E6", 
		"COLOR_OLD" => "C0C0C0", 
		"PERIOD_NEW_TAGS" => "", 
		"SHOW_CHAIN" => "Y", 
		"COLOR_TYPE" => "Y", 
		"WIDTH" => "100%", 
		"SORT" => "NAME", 
		"PAGE_ELEMENTS" => "150", 
		"PERIOD" => "", 
		"URL_SEARCH" => "/search/index.php", 
		"TAGS_INHERIT" => "Y", 
		"CHECK_DATES" => "Y",
		"FILTER_NAME"=> "",
		"arrFILTER" => Array("no"),
		"CACHE_TYPE" => "A", 
		"CACHE_TIME" => "3600" 
	)
);?>

14. Техподдержка
<?$APPLICATION->IncludeComponent(
"bitrix:support.ticket",
"",
Array(),
false
);?>

15. Вывод множественного свойства типа text / html
  <?foreach($arItem["DISPLAY_PROPERTIES"]["SERV_ANKETA"]["VALUE"] as $p=>$value):?>
            <div class="anketa rL">
                <?=$arItem["DISPLAY_PROPERTIES"]["SERV_ANKETA"]["DISPLAY_VALUE"][$p]?>
             </div>
		<?endforeach?> 
        
16. Вывод множественного свойства типа строка
 <?foreach($arItem["DISPLAY_PROPERTIES"]["SERV_LIST"]["VALUE"] as $k=>$value):?>   
                <li><?=$value?><?=$arItem["DISPLAY_PROPERTIES"]["SERV_LIST"]["DESCRIPTION"][$k]?></li>
                <?endforeach?>
                
                
                
17. вывод свойства типа файл
<? echo CFile::GetPath($arItem["PROPERTIES"]["download"]["VALUE"]) ?>

18. вывод свойства
<?=$arItem['PROPERTIES']['CITY']['VALUE']?>

19. Вывод свойства html - text
<?=htmlspecialcharsBack($arResult["PROPERTIES"]["TIMESHEET"]["VALUE"]["TEXT"])?>

20. Условие вывода свойства
<? if ($arResult["DISPLAY_PROPERTIES"]['FOR_MAN']){?>

<? } ?>

<? if(!empty($arResult['PROPERTIES']['pics']['VALUE'])){?>

<? } ?>

21. Вывод заголовка h1
<?$APPLICATION->ShowTitle(false)?>

22. Вывод title
<title><?$APPLICATION->ShowTitle()?></title>

23. Вывод начинки тега <head>
 <?$APPLICATION->ShowHead();?>

24. Вывод панели
<div id="panel"><?$APPLICATION->ShowPanel();?></div>

25. Подключение файлов
<?=SITE_TEMPLATE_PATH?>/

26. Сумма товава битрикс
<?=$arItem['SUM']?>

27. Вывод свойства привязка к яндекс карте
   <?$map=explode(',',$arItem['PROPERTIES']['MAP']['VALUE']);
              $MAP_DATA['yandex_lat'] = $map[0];
              $MAP_DATA['yandex_lon'] = $map[1];
              $MAP_DATA['yandex_scale'] = 16;
              $MAP_DATA['PLACEMARKS'][0]['LON'] = $map[1];
              $MAP_DATA['PLACEMARKS'][0]['LAT'] = $map[0];
              $MAP_DATA['PLACEMARKS'][0]['TEXT'] = $arItem['NAME'];
            ?>
            
            <?$APPLICATION->IncludeComponent(
             "bitrix:map.yandex.view",
             "",
             Array(
              "CONTROLS" => array("ZOOM", "SMALLZOOM"),
              "INIT_MAP_TYPE" => "MAP",
              "MAP_DATA" => serialize($MAP_DATA),
              "MAP_HEIGHT" => "300",
              "MAP_ID" => "MAP".$arItem['ID'],
              "MAP_WIDTH" => "100%",
              "OPTIONS" => array("ENABLE_SCROLL_ZOOM", "ENABLE_DBLCLICK_ZOOM", "ENABLE_DRAGGING")
             )
            );?>
            
            
28. Множественный список
  <?foreach($arItem["PROPERTIES"]["КОД_НУЖНОГО_СВОЙСТВА"]["VALUE"] as $val)($arItem["PROPERTIES"]["КОД_НУЖНОГО_СВОЙСТВА"]["VALUE"] as $val):?>
   <?print_r($val);?>
<?endforeach;?>

29. Изображение раздела в catalog.section
<?=$arResult["PICTURE"]["SRC"]?>

30. Вывод свойства раздела в catalog.section
<? 
   $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter = Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "ID"=>$arResult["ID"]), true,$arSelect=Array("UF_PIC1")); 
   while($ar_result = $db_list->GetNext()):   
?> 
   <img src="<?=CFile::GetPath($ar_result["UF_PIC1"]); ?>" alt=""> 
<?endwhile?>

31. Вывод разделов, к которым относится элемент
<? $db_old_groups = CIBlockElement::GetElementGroups($arItem['ID'], false);
while($ar_group = $db_old_groups->Fetch()) {
   echo $ar_group["NAME"];
   }?>
<a href="/lifeHack/<? echo $ar_group["CODE"];?>/"><? echo $ar_group["NAME"];?></a>

32. Обрезание текста
<?=TruncateText($arItem["NAME"], 100);?>

33. Обрезание картинок
<? 
   $renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 363, "height" => 411), BX_RESIZE_IMAGE_EXACT, false);?> 
   <? echo '<img class="rL w100 db" alt="'.$arItem["NAME"].'" src="'.$renderImage["src"].'" />'; 
?>

<? 
   $renderImage = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], Array("width" => 363, "height" => 411), BX_RESIZE_IMAGE_EXACT, false);?> 
      
   <? echo '<img class="rL w100 db" alt="'.$arFields["NAME"].'" src="'.$renderImage["src"].'" />'; 
?>

34. Фильтрация по свойству
<?
   $GLOBALS["topF"] = array('IBLOCK_ID'=>2, 'PROPERTY_8' => 3);
?>

35. Задание свойства в массив
<? "PARENT_SECTION" => $arResult['PROPERTIES']['predl_id']['VALUE'], ?>

36. Вывод непустого свойства в каталоге
<?if(!empty($arResult['PROPERTIES']['video']['VALUE'])){?>

37. Вывод свойства типа список с XML_ID
<? foreach ($arResult["PROPERTIES"]["services"]["VALUE_XML_ID"] as $key => $link): ?>
   <a href="/portfolio/?services=<?= $link ?>"><?=$arResult["PROPERTIES"]["services"]["VALUE"][$key];?></a>
<?endforeach;?>
   
   
38. вывод доп свойств разделов
одинарное
 <?
$db_list = CIBlockSection::GetList(Array(SORT=>"ASC"), $arFilter = Array("IBLOCK_ID"=>$arSection["IBLOCK_ID"], "ID"=>$arSection["ID"]), true,$arSelect=Array("UF_*")); 
while($ar_result = $db_list->GetNext()){   
		echo $ar_result["UF_PRICE"]; 
	}
?> 

множественное
<?
$db_list = CIBlockSection::GetList(Array(SORT=>"ASC"), $arFilter = Array("IBLOCK_ID"=>$arSection["IBLOCK_ID"], "ID"=>$arSection["ID"]), true,$arSelect=Array("UF_*")); 
while($ar_result = $db_list->GetNext()){   
	foreach($ar_result["UF_FILTR"] as $PROP){
	$rsEnum = CUserFieldEnum::GetList(array(), array("ID" =>$PROP)); 
	$arEnum = $rsEnum->GetNext(); 
	echo $arEnum["VALUE"]; 
	}
}
?>
<pre><?print_r($arResult)?></pre>

39. Если мы хотим вывести контект только на главной странице 
<?if($APPLICATION->getCurPage()=='/'){?> 
   Контент для главной
<?}?>

40.Для все кроме главной 
<?if($APPLICATION->getCurPage()!='/'){?> 
   Контент для всех, кроме главной
<?}?>

41.
<?if($APPLICATION->getCurPage()=='/'){?> 
   контент для главной
<?}else{?>
   контент для всех, кроме главной
<?}?> 

42. 
<?if($APPLICATION->getCurPage()=='/'){?> 
   контент для главной
<?} else if($APPLICATION->getCurPage()=='/catalog/'){?>
   контент для страницы catalog 
<?}else{?>
   контент для всех, кроме главной и каталога
<?}?> 

43. Если нужно применить контект к разделу и  всем элементам инфоблока этого раздела
<? if (CSite::InDir('/catalog/')){ ?>
   Контент
<?}?> 

44. А если только для раздела
<? if (CSite::InDir('/catalog/index.php')){ ?>
   Контент
<?}?>  

44. простая привязка к разделам 
      <ul>
      <?foreach($arResult["PROPERTIES"]["PRICE"]["VALUE"] as $idel):?>
         <?$obj = CIBlockSection::GetByID($idel);?>
         $arFields = $ob->GetFields();  
         //print_r($arFields);
         <?if($objres = $obj->GetNext())?>
         <li><a href='<?=$objres["SECTION_PAGE_URL"];?>'><?=$objres["NAME"];?></a></li>
         <?endforeach;?>
         </ul>


         хз как доделать 

         <!-- <?$related_arr = $arResult["PROPERTIES"]["PRICE"]["VALUE"]?>
<?foreach($arResult["PROPERTIES"]["PRICE"]["VALUE"] as $idel):?>
                <?
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PRICE", "DEF_PRICE", "PRICE_OLD");
$arFilter = Array("IBLOCK_ID"=>9, "ACTIVE"=>"Y", "SECTION_ID"=>$idel);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement()):?>


    <?
    $arFields = $ob->GetFields();  
    // print_r($arFields);
    $arProps = $ob->GetProperties();
    print_r($arProps);
    ?>  

     

<?endwhile?> 
<?endforeach;?> -->


<!-- <ul>
      <?foreach($arResult["PROPERTIES"]["PRICE"]["VALUE"] as $idel):?>
         <?$obj = CIBlockSection::GetByID($idel);?>
       $arFields = $ob->GetFields();  
         //print_r($arFields); 
         <?if($objres = $obj->GetNextElement())?>
                    <?
                $arFields = $objres->GetFields();  
                print_r($arFields);
                $arProps = $objres->GetProperties();
                print_r($arProps);
                ?>  


         <li><a href=''><?=$arProps["DEF_PRICE"];?></a></li>
         <?endforeach;?>
         </ul> -->
         ?>

45. Получение элементов доп.полей
<?
	$resSection = CIBlockSection::GetList(
                Array(),
                Array('IBLOCK_ID'=>$arParams["IBLOCK_ID"],'CODE'=>$arResult["VARIABLES"]["SECTION_CODE"]),
                false,
                Array(
                    'NAME',
                    'UF_GRUZ',
                    'PICTURE',
                    'UF_OBEM',
                    'UF_SPEED',
                    'UF_BLOCK_1',
                    'UF_PRICE_TOP',
                    'UF_HEAD_2',
                    'UF_BLOCK_2',
                    'UF_HEAD_3',
                    'UF_BLOCK_3',
                    'UF_HEAD_4',
                    'UF_BLOCK_4',
                    'UF_HEAD_5',
                    'UF_BLOCK_5',
                    'UF_PRICE',
                    'UF_SLIDER',
                    'UF_PREIMUSHESTVA',
                    'UF_H2_FCR',
					'PRICE_H',
                    'UF_PRICETABLE2',
                    'UF_PRICETABLE2_TITLE',
                    'UF_PRICETABLE3_TITLE',
                    'UF_PRICETABLE3',
                )
            )->fetch();
            
            $subSections = CIBlockSection::GetCount(Array("SECTION_ID"=>$arParams['ID'])); ?>


46. Фикс lazyload 
            			
			<!-- Когда картинки все равно видны в pagespeed в правках используем этот способ для первых элементов на страницах а в инициализации lazyload играемся с параметром  delay -->
			<!-- Например
				$(document).ready(function(){$(function(){$(".lazy").lazy({visibleOnly:!0,effect:"fadeIn",delay:2600,threshold:0,})})})
				-->
			<? $counter_elem = 0;?>
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?if ($arItem['PROPERTIES']['ATTR_LINK']['VALUE']) :?>
				<a class='top-slide' id="<?=$this->GetEditAreaId($arItem['ID'])?>" href="<?=$arItem['PROPERTIES']['ATTR_LINK']['VALUE']?>">
					<img   <?if($counter_elem == 0){?><?}else{?>class="lazy"<?}?>  <?if($counter_elem == 0){?>src<?}else{?>data-src<?}?>="<?=$arItem['PREVIEW_PICTURE']['SRC']?>">
      			</a>
				<?else :?>
				<?endif?>
				<?$counter_elem = $counter_elem + 1;?>
			<?endforeach?>	
47. Если нет доступа к настройкам php на хостинге, а бэкап не разрешает делать - комменируем данные строчки в restore.php (1247-1248)
// if ($mb_overload_value > 0)
// 	$strErrMsg = getMsg('FUNC_OVERLOAD_ERROR').'<br><br>'.$strErrMsg;

