<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

// Обрабатываем фото статьи.
if($arResult['PREVIEW_PICTURE']['ID']):
    $resizeImage = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], ['width' => 700, 'height' => 400], BX_RESIZE_IMAGE_EXACT, false);

    $arResult['DETAIL_PICTURE'] = $resizeImage['src'];
endif;

// Получаем автора статьи.
if($arResult['DISPLAY_PROPERTIES']['AUTHOR']['VALUE'] && (intval($arResult['DISPLAY_PROPERTIES']['AUTHOR']['VALUE']) > 0)):
    $arUser = \Bitrix\Main\UserTable::getList([
        'filter' => ['ID' => intval($arResult['DISPLAY_PROPERTIES']['AUTHOR']['VALUE'])],
        'select' => ['NAME', 'LAST_NAME'],
        'limit' => 1
    ])->fetch();

    if(!empty($arUser)):
        $arResult['AUTHOR'] = trim(implode(' ', $arUser));
    endif;
endif;

// Формируем массив с данными для функционала Поделиться в соц. сетях
if(array_key_exists('USE_SHARE', $arParams) && $arParams['USE_SHARE'] == 'Y') {
    $arResult['SHARE_DATA'] = [
        'TITLE' => $arResult['NAME'],
        'URL' => CHTTP::URN2URI($arResult['DETAIL_PAGE_URL'])
    ];
}