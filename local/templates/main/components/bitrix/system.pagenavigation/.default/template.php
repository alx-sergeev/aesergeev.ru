<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<ul class="pagination mt-5 justify-content-center">
    <?if ($arResult["NavPageNomer"] > 1):?>
        <li class="page-item">
            <?if ($arResult["NavPageNomer"] > 2):?>
                <a class="page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
                    <span class="fa fa-angle-double-left"></span> <?= Loc::getMessage('COMP_SYSTEM_PAGENAVIGATION_PREV'); ?>
                </a>
            <?else:?>
                <a class="page-link" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
                    <span class="fa fa-angle-double-left"></span> <?= Loc::getMessage('COMP_SYSTEM_PAGENAVIGATION_PREV'); ?>
                </a>
            <?endif?>
        </li>
    <?endif?>

    <?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
        <li class="page-item">
            <?if($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                <a class="page-link active" href="javascript:">
                    <?=$arResult["nStartPage"]?>
                </a>
            <?else:?>
                <a class="page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>">
                    <?=$arResult["nStartPage"]?>
                </a>
            <?endif?>
        </li>

        <?$arResult["nStartPage"]++?>
    <?endwhile?>

    <?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
        <li class="page-item">
            <a class="page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
                <?= Loc::getMessage('COMP_SYSTEM_PAGENAVIGATION_NEXT'); ?> <span class="fa fa-angle-double-right"></span>
            </a>
        </li>
    <?endif?>
</ul>


