<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

<div class="review-block">
    <div class="review-text">
        <? if ($arResult["DETAIL_TEXT"]): ?>
            <div class="review-text-cont">
                <?= $arResult["DETAIL_TEXT"] ?>
            </div>
        <? endif; ?>
        <div class="review-autor">
            <? if ($arResult["NAME"]): ?>
                <?= $arResult["NAME"] ?>,
            <? endif; ?>
            <? if ($arResult["DISPLAY_ACTIVE_FROM"]): ?>
                <?= $arResult["DISPLAY_ACTIVE_FROM"] ?>,
            <? endif; ?>
            <? if ($arResult["DISPLAY_PROPERTIES"]): ?>
                <? if ($arResult["DISPLAY_PROPERTIES"]["POSITION"]): ?>
                    <?= $arResult["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"] ?>,
                <? endif; ?>
                <? if ($arResult["DISPLAY_PROPERTIES"]["COMPANY"]): ?>
                    <?= $arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"] ?>.
                <? endif; ?>
            <? endif; ?>
        </div>
    </div>
    <div style="clear: both;" class="review-img-wrap">
        <? if ($arResult["DETAIL_PICTURE"]): ?>
            <img src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" alt="img">
        <? else: ?>
            <img src="<?= SITE_TEMPLATE_PATH ?>/img/no_photo.jpg" alt="img">
        <? endif; ?>
    </div>
</div>
<? if (isset($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"])): ?>
    <div class="exam-review-doc">
        <p><?= GetMessage("DOCUMENTS_TITLE"); ?></p>
        <?
        if (isset($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"]["ID"])):
            $arProperties = array(0 => $arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"]);
        else:
            $arProperties = $arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"];
        endif;
        foreach ($arProperties as $arProperty): ?>
            <div class="exam-review-item-doc"><img class="rew-doc-ico"
                                                   src="<?= SITE_TEMPLATE_PATH ?>/img/icons/pdf_ico_40.png">
                <a href="<?= $arProperty['SRC'] ?>"><?= $arProperty["ORIGINAL_NAME"] ?></a></div>
        <? endforeach; ?>
    </div>
<? endif; ?>
<hr>
<a href="<?= $arResult["LIST_PAGE_URL"] ?>" class="review-block_back_link"> &larr; К списку отзывов</a>