<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

if(count($arResult['ITEMS']) > 0){
    foreach($arResult['ITEMS'] as $key => $arItem):
        if($arItem['PREVIEW_PICTURE']['ID']):
            $resizeImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], ['width' => 500, 'height' => 450], BX_RESIZE_IMAGE_EXACT, false);

            $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['SRC'] = $resizeImage['src'];
        endif;
    endforeach;
}