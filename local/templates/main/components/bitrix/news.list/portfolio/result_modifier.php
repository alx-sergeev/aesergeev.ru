<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!empty($arResult["ITEMS"])) {
    foreach($arResult["ITEMS"] as $key => $arItem):
        if(empty($arItem['PREVIEW_PICTURE']['ID'])) continue;

        $resizeImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], ['width' => 1000, 'height' => 900], BX_RESIZE_IMAGE_EXACT, false);

        $arResult["ITEMS"][ $key ]['PREVIEW_PICTURE']['SRC'] = $resizeImage['src'];
    endforeach;
}