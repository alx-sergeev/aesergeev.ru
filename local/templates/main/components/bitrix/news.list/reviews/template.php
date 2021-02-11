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
    <section class="w3l-testimonials" id="testimonials">
        <div class="customers-6-content py-5">
            <div class="container py-lg-3">
                <h3 class="global-title global-white">
                    <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/reviews_title.php', [], ['NAME' => 'Заголовок блока Отзывы', 'MODE' => 'php']);?>
                </h3>

                <div class="customer row">
                    <?foreach($arResult["ITEMS"] as $arItem):?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <div class="col-lg-4 col-md-6 mt-md-3 mt-3" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                            <div class="card">
                                <h3 class="card-title"><?echo $arItem["NAME"]?></h3>

                                <div class="card-body">
                                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                                    <p class="card-text"><?echo $arItem["PREVIEW_TEXT"];?></p>
                                </div>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </section>
<?}?>