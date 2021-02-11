<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>

<?if(!empty($arResult["ITEMS"][0])){
    $arItem = $arResult["ITEMS"][0];

    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
    <div class="w3l-about1 pt-5" id="about">
        <div class="container pt-lg-3">
            <h3 class="global-title">
                <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/about_title.php', [], ['NAME' => 'Заголовок блока Обо мне', 'MODE' => 'php']);?>
            </h3>

            <div class="aboutgrids row" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="col-lg-5 aboutgrid2">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?echo $arItem["NAME"]?>" class="img-fluid" />
                </div>

                <div class="col-lg-7 aboutgrid1 my-lg-0 my-5">
                    <h4><?echo $arItem["NAME"]?></h4>

                    <div class="about-text">
                        <?echo $arItem["PREVIEW_TEXT"];?>
                    </div>

                    <? if(count($arItem['DISPLAY_PROPERTIES']['CERTIFICATES']['FILE_VALUE']) > 0){?>
                        <div class="row b-about-certs">
                            <?foreach($arItem['DISPLAY_PROPERTIES']['CERTIFICATES']['FILE_VALUE'] as $arFile):?>
                                <div class="col-md-3 col-sm-3 col-cert">
                                    <a href="<?= $arFile['SRC']; ?>" class="js-img-viwer" data-caption="<?echo $arItem["NAME"]?>" data-group="certs">
                                        <img src="<?= $arFile['SRC']; ?>" class="img-fluid insta-pic" alt="<?echo $arItem["NAME"]?>">
                                    </a>
                                </div>
                            <?endforeach;?>
                        </div>
                    <?}?>

                    <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/about_button.php', [], ['NAME' => 'Кнопка в блоке Обо мне', 'MODE' => 'php']);?>
                </div>
            </div>
        </div>

        <div class="aboutbottom py-5">
            <div class="container py-lg-3">
                <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/about_advantage.php', [], ['NAME' => 'Преимущества в блоке Обо мне', 'MODE' => 'php']);?>
            </div>
        </div>
    </div>
<?}?>
