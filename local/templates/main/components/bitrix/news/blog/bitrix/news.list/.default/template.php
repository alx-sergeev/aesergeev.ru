<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

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
?>

<?if(count($arResult['ITEMS'])){?>
    <section class="w3l-blog">
        <section id="grids5-block" class="py-5">
            <div class="container py-lg-3">
                <div class="grid-view">
                    <div class="row">
                        <?foreach($arResult['ITEMS'] as $arItem):?>
                            <?
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <div class="col-lg-4 col-md-6 mt-md-4 mt-4" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                <div class="grids5-info">
                                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="d-block zoom">
                                        <img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt="<?= $arItem['NAME']; ?>" class="img-fluid news-image" />
                                    </a>

                                    <div class="blog-info">
                                        <?if($arParams['DISPLAY_NAME']!='N' && $arItem['NAME']):?>
                                            <h4>
                                                <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">
                                                    <?= $arItem['NAME']; ?>
                                                </a>
                                            </h4>
                                        <?endif;?>

                                        <?if($arParams['DISPLAY_DATE']!='N' && $arItem['DISPLAY_ACTIVE_FROM']):?>
                                            <p class="date">
                                                <?echo $arItem['DISPLAY_ACTIVE_FROM']?>
                                            </p>
                                        <?endif?>

                                        <?if($arParams['DISPLAY_PREVIEW_TEXT']!='N' && $arItem['PREVIEW_TEXT']):?>
                                            <p class="blog-text">
                                                <?= $arItem['PREVIEW_TEXT']; ?>
                                            </p>
                                        <?endif;?>

                                        <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="btn btn-news mt-4"><?= Loc::getMessage('ARTICLE_MORE_BUTTON_TEXT'); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>

                <?if($arParams['DISPLAY_BOTTOM_PAGER']):?>
                    <?=$arResult['NAV_STRING']?>
                <?endif;?>
            </div>
        </section>
    </section>
<?} else {?>
    <section class="w3l-blog">
        <section id="grids5-block" class="py-5 b-content">
            <div class="container py-lg-3">
                <div class="grid-view">
                    <div class="row">
                        <?= Loc::getMessage('ARTICLES_NOT_FOUND'); ?>
                    </div>
                </div>
            </div>
        </section>
    </section>
<?}?>
