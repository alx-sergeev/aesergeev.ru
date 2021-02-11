<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

if(count($arResult['ITEMS']) > 0){
    foreach($arResult['ITEMS'] as $key => $arItem):
        if($arItem['PREVIEW_PICTURE']['ID']):
            $resizeImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], ['width' => 500, 'height' => 450], BX_RESIZE_IMAGE_EXACT, false);

            $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['SRC'] = $resizeImage['src'];
        endif;

        if($arItem['PREVIEW_TEXT']):
            $tmpPreviewText = mb_substr($arItem["PREVIEW_TEXT"], 0, 200, 'UTF-8');
            $findProbel = mb_strripos($tmpPreviewText, ' ', 0, 'UTF-8');

            if(!$findProbel)
            {
                $numStartSearch = 350;
                $addSymbols = '';
            }
            else
            {
                $numStartSearch = $findProbel;
                $addSymbols = '...';
            }

            $arResult['ITEMS'][$key]['PREVIEW_TEXT'] = strip_tags(mb_substr($tmpPreviewText, 0, $numStartSearch, 'UTF-8') . $addSymbols);
        endif;
    endforeach;
}