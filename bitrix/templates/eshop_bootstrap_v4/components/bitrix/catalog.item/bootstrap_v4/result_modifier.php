<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arResult["COMPARE_ISSET"] = "N";

if (!empty($_SESSION["CATALOG_COMPARE_LIST"][$arResult["ITEM"]["IBLOCK_ID"]]["ITEMS"])) {
    foreach ($_SESSION["CATALOG_COMPARE_LIST"][$arResult["ITEM"]["IBLOCK_ID"]]["ITEMS"] as $item) {
        if ($item["ID"] == $arResult["ITEM"]["ID"])
            $arResult["COMPARE_ISSET"] = "Y";
    }
}
