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
    <section class="w3l-services2">
        <div class="features-with-17_sur">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 features-with-17-left_sur"></div>

                    <div class="col-lg-6 my-lg-0 my-5 align-self-center features-with-17-right_sur">
                        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                            <?
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <div class="features-with-17-right-tp_sur" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                                <div class="features-with-17-left1">
                                    <span class="fa <?= $arItem['DISPLAY_PROPERTIES']['CODE_ICON']['VALUE'];?>"></span>
                                </div>
                                <div class="features-with-17-left2">
                                    <h6>
                                        <a href="javascript:"><?= ++$key; ?>. <?echo $arItem["NAME"]?></a>
                                    </h6>

                                    <?if($arItem["PREVIEW_TEXT"]):?>
                                        <p><?echo $arItem["PREVIEW_TEXT"];?></p>
                                    <?endif;?>
                                </div>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?}?>
