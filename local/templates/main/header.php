<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Page\Asset;

global $APPLICATION;
$assetInstance = Asset::getInstance();


// Подключение стилей.
$arStyles = [
    'stackoverflow-light'
];
foreach($arStyles as $styleName)
    $assetInstance->addCss(SITE_TEMPLATE_PATH . "/assets/css/{$styleName}.css");


// Подключение скриптов.
$arScripts = [
    'part1',
    'jquery-3.4.1.slim.min',
    'bootstrap.min.js',
    'jquery.magnific-popup.min',
    'part2',
    'smartphoto',
    'highlight.pack',
    'custom'
];
foreach($arScripts as $scriptName)
    $assetInstance->addJs(SITE_TEMPLATE_PATH . "/assets/js/{$scriptName}.js");


// Проверка на главную.
$isMain = $APPLICATION->GetCurPage() == '/';
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID; ?>">
	<head>
		<?$APPLICATION->ShowHead();?>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="yandex-verification" content="fb96cb25f689e4b2" />
		<title><?$APPLICATION->ShowTitle();?></title>

        <link href="//fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    </head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>

        <header class="w3l-header">
            <div class="hero-header-11">
                <div class="hero-header-11-content">
                    <div class="container">
                        <nav class="navbar navbar-expand-xl navbar-light py-sm-2 py-1 px-0">
                            <!--a class="navbar-brand editContent" href="/">АС</a-->

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fa fa-bars"></span>
                            </button>

                            <?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MENU_CACHE_TIME" => "86400",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "Y",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <?if(!$isMain) {?>
            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", Array(
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	),
	false
);?>
        <?}?>