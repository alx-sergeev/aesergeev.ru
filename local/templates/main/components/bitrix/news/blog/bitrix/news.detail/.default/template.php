<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
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

use \Bitrix\Main\Localization\Loc;


if(array_key_exists('USE_SHARE', $arParams) && $arParams['USE_SHARE'] == 'Y') {
    $this->addExternalJs('https://yastatic.net/share2/share.js');
}
?>

<section class='w3l-blog-single'>
    <section class='w3l-blog-single1 py-5'>
        <div class='container py-lg-3'>
            <?if($arResult['DETAIL_PICTURE']):?>
                <div class='text-bg-image' style="background-image: url('<?= $arResult['DETAIL_PICTURE']; ?>');"></div>
            <?endif;?>

            <div class='d-grid-1'>
                <div class='text'>
                    <?if($arParams['DISPLAY_NAME']!='N' && $arResult['NAME']):?>
                        <h3 class='text-title'>
                            <?= $arResult['NAME']; ?>
                        </h3>
                    <?endif;?>

                    <ul class='blog-list'>
                        <?if($arParams['DISPLAY_DATE']!='N' && $arResult['DISPLAY_ACTIVE_FROM']):?>
                            <li>
                                <p>
                                    <span class='fa fa-clock-o'></span> <?=$arResult['DISPLAY_ACTIVE_FROM']?>
                                </p>
                            </li>
                        <?endif;?>

                        <?if($arResult['AUTHOR']):?>
                            <li>
                                <p><span class='fa fa-user'></span> <?= $arResult['AUTHOR']; ?></p>
                            </li>
                        <?endif;?>
                    </ul>
                </div>
            </div>

            <div class='text-content-text'>
                <div class='d-grid-2'>
                    <div class='text2'>
                        <div class='text2-text'>
                            <?if($arResult['DETAIL_TEXT']):?>
                                <?= $arResult['DETAIL_TEXT']; ?>
                            <?else:?>
                                <?= $arResult['PREVIEW_TEXT']; ?>
                            <?endif?>

                            <div class="b-blog-footer">
                                <div class="b-blog-back">
                                    <a href="<?= $arResult['LIST_PAGE_URL']; ?>"><?= Loc::getMessage('BLOG_DETAIL_BACK_TEXT'); ?></a>
                                </div>

                                <?if(!empty($arResult['SHARE_DATA'])){?>
                                    <div
                                            class="ya-share2 b-social-share"
                                            data-title="<?= $arResult['SHARE_DATA']['TITLE']; ?>"
                                            data-url="<?= $arResult['SHARE_DATA']['URL']; ?>"
                                            data-curtain
                                            data-limit="0"
                                            data-more-button-type="long"
                                            data-popup-direction="auto"
                                            data-services="vkontakte,telegram,skype,whatsapp,viber,facebook,odnoklassniki,twitter"
                                    ></div>
                                <?}?>
                            </div>

                            <div class="b-blog-comments">
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:catalog.comments",
                                    "",
                                    Array(
                                        "CACHE_TIME" => "0",
                                        "CACHE_TYPE" => "A",
                                        "CHECK_DATES" => "Y",
                                        "COMMENTS_COUNT" => "1",
                                        "ELEMENT_CODE" => "",
                                        "ELEMENT_ID" => $arResult['ID'],
                                        "FB_USE" => "N",
                                        "IBLOCK_ID" => "8",
                                        "IBLOCK_TYPE" => "content",
                                        "SHOW_DEACTIVATED" => "N",
                                        "TEMPLATE_THEME" => "blue",
                                        "URL_TO_COMMENT" => "",
                                        "VK_API_ID" => VK_API_ID,
                                        "VK_TITLE" => "Комментарии Вконтакте",
                                        "VK_USE" => "Y",
                                        "WIDTH" => ""
                                    )
                                );?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>