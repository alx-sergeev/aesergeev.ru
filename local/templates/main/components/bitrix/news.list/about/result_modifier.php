<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!empty($arResult["ITEMS"][0])) {
    $arItem = $arResult["ITEMS"][0];

    if(!empty($arItem['PREVIEW_PICTURE']['ID'])) {
        $resizeImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], ['width' => 435, 'height' => 500], BX_RESIZE_IMAGE_EXACT, false);

        $arResult["ITEMS"][0]['PREVIEW_PICTURE']['SRC'] = $resizeImage['src'];
    }
}