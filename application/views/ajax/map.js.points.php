YMaps.jQuery(function () {
	var map = new YMaps.Map(YMaps.jQuery("#map")[0]);
	map.setCenter(new YMaps.GeoPoint(82.920074, 55.026091), 11);
	map.addControl(new YMaps.Zoom());
	map.enableScrollZoom();
	
	var aezhicon = new YMaps.Style();
	aezhicon.iconStyle = new YMaps.IconStyle();
	aezhicon.iconStyle.href = "/src/img/aezhicon.png";
	aezhicon.iconStyle.size = new YMaps.Point(32, 38);
	aezhicon.iconStyle.offset = new YMaps.Point(-17, -36);
<?foreach($points as $point){?>
	var placemark = new YMaps.Placemark(new YMaps.GeoPoint(<?=$point->x?>, <?=$point->y?>), {style: aezhicon});
	placemark.zoom = <?=$point->zoom?>;
	placemark.name = "<?=$point->title?>";
	placemark.description = "<?=$point->desc?>";
	placemark.ids = "<?=$point->id?>";
	map.addOverlay(placemark);
<?}?>
});