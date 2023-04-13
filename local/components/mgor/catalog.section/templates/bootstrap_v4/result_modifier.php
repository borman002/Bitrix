<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

foreach ($arResult['ITEMS'][0]['OFFERS'] as $k => $offer) {
    if ($offer['PROPERTIES']['ARTNUMBER']['VALUE'] != $_GET['q'])
        unset($arResult['ITEMS'][0]['OFFERS'][$k]);
}

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
