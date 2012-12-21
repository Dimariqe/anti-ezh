YMaps.jQuery(function () {
	var aezhicon = new YMaps.Style();
	aezhicon.iconStyle = new YMaps.IconStyle();
	aezhicon.iconStyle.href = "/src/img/aezhicon.png";
	aezhicon.iconStyle.size = new YMaps.Point(32, 38);
	aezhicon.iconStyle.offset = new YMaps.Point(-17, -36);
	$.fx.speeds._default = 500;
	$("#dialog").dialog({
		autoOpen: false,
		show: "fade",
		hide: "fade",
		modal: true,
		buttons: {
			"Сохранить точку": function() {
				var placemark = new YMaps.Placemark(new YMaps.GeoPoint(parseFloat($("#pointcontrolezh #xyz").val().split(',')[0]), parseFloat($("#pointcontrolezh #xyz").val().split(',')[1])), {draggable: true, style: aezhicon});
				placemark.zoom = $("#pointcontrolezh #zoom").val();
				placemark.name = $("#pointcontrolezh #title").val();
				placemark.description = $("#pointcontrolezh #desc").val();
				placemark.ids = $("#pointcontrolezh #ids").val();
				$.post("/ajax/map/admin/update/", {
						x: parseFloat($("#pointcontrolezh #xyz").val().split(',')[0]), 
						y: parseFloat($("#pointcontrolezh #xyz").val().split(',')[1]), 
						zoom: placemark.zoom,
						name: placemark.name,
						desc: placemark.description,
						id: placemark.ids},
					function(data) {
						if(placemark.ids=="")
							placemark.ids=data.id;
					}, "json");
				map.addOverlay(placemark);
				YMaps.Events.observe(placemark, placemark.Events.DragEnd, function (obj) {
					$("#pointcontrolezh #xyz").val(placemark.getGeoPoint());
					$("#pointcontrolezh #zoom").val(map.getZoom());
					$("#pointcontrolezh #title").val(placemark.name);
					$("#pointcontrolezh #desc").val(placemark.description);
					$("#pointcontrolezh #ids").val(placemark.ids);
					map.removeOverlay(placemark);
					$("#dialog").dialog("open");
				});
				$("#pointcontrolezh").trigger("reset");
				$(this).dialog("close");
			},
			"Удалить точку": function() {
				$.post("/ajax/map/admin/delete/", {
						id: $("#pointcontrolezh #ids").val()},
					function(data) {
									
					}, "json");
						$("#pointcontrolezh").trigger("reset");
						$(this).dialog("close");
						
			}				
		}
	});
	var map = new YMaps.Map(YMaps.jQuery("#map")[0]);
	map.setCenter(new YMaps.GeoPoint(82.920074, 55.026091), 11);
	map.addControl(new YMaps.Zoom());
	map.enableScrollZoom();
	YMaps.Events.observe(map, map.Events.Click, function (map, mEvent) {
		$("#dialog").dialog("open");
		$("#pointcontrolezh #xyz").val(mEvent.getGeoPoint());
		$("#pointcontrolezh #zoom").val(map.getZoom());
	});
<?foreach($points as $point){?>

	var placemark = new YMaps.Placemark(new YMaps.GeoPoint(<?=$point->x?>, <?=$point->y?>), {draggable: true, style: aezhicon});
	placemark.zoom = <?=$point->zoom?>;
	placemark.name = "<?=$point->title?>";
	placemark.description = "<?=$point->desc?>";
	placemark.ids = "<?=$point->id?>";
	map.addOverlay(placemark);
	YMaps.Events.observe(placemark, placemark.Events.DragEnd, function (obj) {
		$("#pointcontrolezh #xyz").val(obj.getGeoPoint());
		$("#pointcontrolezh #zoom").val(map.getZoom());
		$("#pointcontrolezh #title").val(obj.name);
		$("#pointcontrolezh #desc").val(obj.description);
		$("#pointcontrolezh #ids").val(obj.ids);
		map.removeOverlay(obj);
		$("#dialog").dialog("open");
	});
<?}?>
});