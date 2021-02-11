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

<?if(!empty($arResult["ITEMS"])){?>
    <section class="w3l-index2">
        <div class="main-w3 py-5" id="stats">
            <div class="container py-lg-3">
                <h3 class="global-title">
                    <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/stats_title.php', [], ['NAME' => 'Заголовок блока Факты обо мне', 'MODE' => 'php']);?>
                </h3>

                <div class="row main-cont-wthree-fea text-center">
                    <?foreach($arResult["ITEMS"] as $arItem):?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <div class="col-lg-3 col-6 mt-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                            <div class="grids-speci1">
                                <span class="fa <?= $arItem['DISPLAY_PROPERTIES']['ICON_CODE']['VALUE']; ?>" aria-hidden="true"></span>
                                <h3 class="title-spe"><?echo $arItem["NAME"]?></h3>
                                <p><?echo $arItem["PREVIEW_TEXT"];?></p>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </section>
<?}?>
