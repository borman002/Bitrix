<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arResult
 * @var array $arParams
 * @var array $templateData
 */

// check compared state
if ($arParams['DISPLAY_COMPARE'])
{
	$compared = false;
	$comparedIds = array();
	$item = $templateData['ITEM'];

	if (!empty($_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]))
	{
		if (!empty($item['JS_OFFERS']))
		{
			foreach ($item['JS_OFFERS'] as $key => $offer)
			{
				if (array_key_exists($offer['ID'], $_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]['ITEMS']))
				{
					if ($key == $item['OFFERS_SELECTED'])
					{
						$compared = true;
					}

					$comparedIds[] = $offer['ID'];
				}
			}
		}
		elseif (array_key_exists($item['ID'], $_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]['ITEMS']))
		{
			$compared = true;
		}
	}

	if ($templateData['JS_OBJ'])
	{
		?>
		<script>
			BX.ready(BX.defer(function(){
				if (!!window.<?=$templateData['JS_OBJ']?>)
				{
					window.<?=$templateData['JS_OBJ']?>.setCompared('<?=$compared?>');

					<? if (!empty($comparedIds)): ?>
						window.<?=$templateData['JS_OBJ']?>.setCompareInfo(<?=CUtil::PhpToJSObject($comparedIds, false, true)?>);
					<? endif ?>
				}
			}));
		</script>
		<?
	}
	?>
	<script>
		$('#<?=$arResult['AREA_ID'].'_compare_link_box'?>, #<?=$arResult['AREA_ID'].'_compare_link_span'?>').click(function(){
				if ($('#<?=$arResult['AREA_ID'].'_compare_link_box'?>').is(":not(:checked)")) {
					$('#<?=$arResult['AREA_ID'].'_compare_link_cont'?>').attr("class","product-item-compare-container-checked");
					$('#<?=$arResult['AREA_ID'].'_compare_link_span'?>').text("<?=GetMessage('COMPARE_ISSET')?>");
				} else {
					$('#<?=$arResult['AREA_ID'].'_compare_link_cont'?>').attr("class","product-item-compare-container");
					$('#<?=$arResult['AREA_ID'].'_compare_link_span'?>').text("<?=$arParams['MESS_BTN_COMPARE']?>");
				}
			});
	</script>
	<?
}