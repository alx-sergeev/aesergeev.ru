<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

use \Bitrix\Main\Localization\Loc;
?>

<section class="w3l-contact py-5" id="contact">
    <div class="container py-lg-3">
        <h3 class="global-title">
            <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/order_form_title.php', [], ['NAME' => 'Заголовок формы заказа', 'MODE' => 'php']);?>
        </h3>

        <div class="row">
            <div class="col-md-8 contact-form">
                <form action="<?=POST_FORM_ACTION_URI . '#formOrder'?>" method="POST" id="formOrder">
                    <?= bitrix_sessid_post(); ?>

                    <div class="order-form-msg">
                        <?if(!empty($arResult["ERROR_MESSAGE"]))
                        {
                            foreach($arResult["ERROR_MESSAGE"] as $v)
                                ShowError($v);
                        }
                        if($arResult["OK_MESSAGE"] <> '')
                        {
                            ?>
                            <span>
                            <?=$arResult["OK_MESSAGE"]?>
                            </span>
                            <?
                        }
                        ?>
                    </div>

                    <input type="text" class="form-control" name="user_name" placeholder="<?= Loc::getMessage("MFT_NAME"); ?>" value="<?=$arResult["AUTHOR_NAME"]?>" /><br/>

                    <input type="email" class="form-control" name="user_email" placeholder="<?= Loc::getMessage("MFT_EMAIL"); ?>" value="<?=$arResult["AUTHOR_EMAIL"]?>" /><br/>

                    <textarea class="form-control" name="MESSAGE" placeholder="<?= Loc::getMessage("MFT_MESSAGE"); ?>" style="height:150px;"><?=$arResult["MESSAGE"]?></textarea><br/>

                    <?if($arParams["USE_CAPTCHA"] == "Y"):?>
                        <div class="mf-captcha">
                            <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">

                            <input type="text" class="form-control" name="captcha_word" size="30" maxlength="50" value="" placeholder="<?= Loc::getMessage("MFT_CAPTCHA_CODE"); ?>">
                        </div>
                    <?endif;?>

                    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                    <input type="submit" name="submit" value="<?= Loc::getMessage("MFT_SUBMIT"); ?>" class="btn btn-primary theme-button">
                </form>
            </div>

            <div class="col-md-4 mt-md-0 mt-5 w3-contact-address">
                <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/order_form_contacts.php', [], ['NAME' => 'Контакты в форме заказа', 'MODE' => 'php']);?>
            </div>
        </div>
    </div>
</section>