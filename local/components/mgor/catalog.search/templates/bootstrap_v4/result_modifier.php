<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?
//проверяем есть ли инфоблок с торговыми предложениями для инфоблока с товарами
$arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams["IBLOCK_ID"]);

if (is_array($arSKU) && isset($_GET["q"])){
    //Выбираем свойства, которые удовлетворяют результатам поиска
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "ARTNUMBER");
    $arFilter = Array(
        "IBLOCK_ID"=>$arSKU["IBLOCK_ID"],
        "ACTIVE"=>"Y",
        "PROPERTY_ARTNUMBER" => $_GET["q"]."%"
    );

    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>5000), $arSelect);
    while($ob = $res->GetNextElement()) {
        $arProps = $ob->GetProperties();
        //Записываем ID товара к которому привязано торговое предложение
        $tmp[] = $arProps["CML2_LINK"]["VALUE"];
    }

    $tmp = array_unique($tmp);
    $arResult["ADDED_ITEMS_IDS"] = $tmp;
}
