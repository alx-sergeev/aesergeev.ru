<?php
/**
 * Файл с событиями Битрикс для сайта.
 */
$eventManager = \Bitrix\Main\EventManager::getInstance();


$eventManager->addEventHandler('main', 'OnBeforeEventSend', ['EventSend', 'OnBeforeEventSendHandler']);

/**
 * Class EventSend
 * Для обработки почтовых событий.
 */
class EventSend
{
    // Событие перед отправкой сообщения
    // Если это сообщение из формы обратной связи, то
    // добавляем заявку в инфоблок
    public function OnBeforeEventSendHandler($arFields, $arTemplate) {
        if(\Bitrix\Main\Loader::includeModule('iblock') && $arTemplate['EVENT_NAME'] == 'FEEDBACK_FORM') {
            $el = new CIBlockElement;

            $props = [
                'FIO' => $arFields['AUTHOR'],
                'EMAIL' => $arFields['AUTHOR_EMAIL']
            ];

            $arLoadProduct = [
                'IBLOCK_ID' => IB_ORDER,
                'NAME' => 'Заявка от ' . date('d.m.Y H:i:s'),
                'PREVIEW_TEXT' => $arFields['TEXT'],
                'PROPERTY_VALUES' => $props
            ];

            $el->Add($arLoadProduct);
        }
    }
}