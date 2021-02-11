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
    <section class="w3l-index6" id="service">
        <div class="features-with-17_sur py-5">
            <div class="container py-lg-3">
                <h3 class="global-title my-title">
                    <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/services_title.php', [], ['NAME' => 'Заголовок блока Мои услуги', 'MODE' => 'php']);?>
                </h3>

                <div class="features-with-17-top_sur">
                    <div class="row">
                        <?foreach($arResult["ITEMS"] as $arItem):?>
                            <?
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>

                            <div class="col-lg-4 col-md-6 mt-md-0 mt-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                                <div class="features-with-17-right-tp_sur">
                                    <div class="features-with-17-left1">
                                        <span class="fa <?= $arItem['DISPLAY_PROPERTIES']['CODE_ICON']['VALUE'];?>" aria-hidden="true"></span>
                                    </div>
                                    <div class="features-with-17-left2">
                                        <h6><a href="javascript:"><?echo $arItem["NAME"]?></a></h6>
                                        <p><?echo $arItem["PREVIEW_TEXT"];?></p>
                                    </div>
                                </div>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?}?>
