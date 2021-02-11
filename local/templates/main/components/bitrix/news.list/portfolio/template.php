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
    <div class="w3l-gallery2" id="gallery">
        <div class="insta-picks py-5">
            <div class="container py-lg-5">
                <h3 class="global-title">
                    <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/portfolio_title.php', [], ['NAME' => 'Заголовок блока Портфолио', 'MODE' => 'php']);?>
                </h3>

                <div class="row no-gutters masonry">
                    <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

                        $projectId = 'project_' . ++$key;
                        ?>

                        <div class="col-md-4 col-sm-6 brick" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                            <a href="<?= $arItem['DISPLAY_PROPERTIES']['WORK_PHOTO']['FILE_VALUE'][0]['SRC']; ?>" class="js-img-viwer d-block" data-caption="<?echo $arItem["NAME"]?>" data-group="<?= $projectId; ?>">
                                <img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" class="img-fluid insta-pic" alt="<?echo $arItem["NAME"]?>" />

                                <div class="content-overlay"></div>

                                <div class="content-details fadeIn-top">
                                    <h4><?echo $arItem["NAME"]?></h4>
                                    <?if($arItem["PREVIEW_TEXT"]):?>
                                        <p><?echo $arItem["PREVIEW_TEXT"];?></p>
                                    <?endif;?>
                                </div>
                            </a>

                            <?if(count($arItem['DISPLAY_PROPERTIES']['WORK_PHOTO']['FILE_VALUE']) > 1):
                                unset($arItem['DISPLAY_PROPERTIES']['WORK_PHOTO']['FILE_VALUE'][0]);
                                ?>
                                <div class="hidden">
                                    <?foreach($arItem['DISPLAY_PROPERTIES']['WORK_PHOTO']['FILE_VALUE'] as $arFile):?>
                                        <a href="<?= $arFile['SRC']; ?>" class="js-img-viwer" data-caption="<?echo $arItem["NAME"]?>" data-group="<?= $projectId; ?>"></a>
                                    <?endforeach;?>
                                </div>
                            <?endif;?>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </div>
<?}?>
