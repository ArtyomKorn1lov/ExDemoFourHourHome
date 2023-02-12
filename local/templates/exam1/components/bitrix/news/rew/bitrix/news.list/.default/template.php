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
<div class="news-list">
    <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?><br/>
    <? endif; ?>

    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <? //HelperTemplate::dump($arItem); ?>

        <div class="review-block">
            <div class="review-text">

                <div class="review-block-title"><span class="review-block-name">
                        <? if ($arItem["NAME"]): ?>
                            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a>
                        <? endif; ?>
                </span>
                    <span class="review-block-description">
                        <? if ($arItem["DISPLAY_ACTIVE_FROM"]): ?>
                            <?= $arItem["DISPLAY_ACTIVE_FROM"] ?>,
                        <? endif; ?>
                        <? if ($arItem["DISPLAY_PROPERTIES"]): ?>
                            <? if ($arItem["DISPLAY_PROPERTIES"]["POSITION"]): ?>
                                <?= $arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"] ?>,
                            <? endif; ?>
                            <? if ($arItem["DISPLAY_PROPERTIES"]["COMPANY"]): ?>
                                <?= $arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"] ?>
                            <? endif; ?>
                        <? endif; ?>
                    </span>
                </div>

                <? if ($arItem["PREVIEW_TEXT"]): ?>
                    <div class="review-text-cont">
                        <?= $arItem["PREVIEW_TEXT"] ?>
                    </div>
                <? endif; ?>
            </div>
            <div class="review-img-wrap">
                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                    <? if ($arItem["PREVIEW_PICTURE"]): ?>
                        <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="img">
                    <? else: ?>
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/no_photo.jpg" alt="img">
                    <? endif; ?>
                </a>
            </div>
        </div>
    <? endforeach; ?>
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br/><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
</div>
