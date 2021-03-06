<script type="text/javascript">
	function createTimeChart(id, data) {
		var oDS = new YAHOO.util.DataSource(data);
		oDS.responseType = YAHOO.util.DataSource.TYPE_JSARRAY;
		oDS.responseSchema = { fields: ["id", "name", "average", "user"] };

		var minutesAxisLabel = function(value) { return value+"m"; };

		var minutesAxis = new YAHOO.widget.NumericAxis();
		minutesAxis.labelFunction = minutesAxisLabel;
		minutesAxis.minimum = 0;
		minutesAxis.title = "<?php echo Lang::t('_MINUTES', 'standard'); ?>";


		var unitsAxis = new YAHOO.widget.CategoryAxis();
		unitsAxis.title = "<?php echo Lang::t('_CHAPTERS', 'standard'); ?>";

		var seriesDef = [
			{displayName: "<?php echo Lang::t('_USER', 'course_charts'); ?>", yField: "user", style: {size: 10}},
			{displayName: "<?php echo Lang::t('_AVERANGE', 'course_charts'); ?>", yField: "average", style: {size: 10}}
		];

		var getDataTipText = function(item, index, series) {
			var toolTipText = series.displayName + ": " + item[series.yField] + " <?php echo Lang::t('_MINUTES', 'standard'); ?>";
			return toolTipText;
		};

		var Chart = new YAHOO.widget.ColumnChart(id, oDS, {
			series: seriesDef,
			xField: "name",
			xAxis: unitsAxis,
			yAxis: minutesAxis,
			dataTipFunction: getDataTipText,
			wmode: "opaque",
			style: {
				padding: 20,
				animationEnabled: false,
				border: {color: 0x000000, size: 1},
        font: {name: "Arial", color: 0x000000, size: 12},
				xAxis: {labelRotation: 45},
				legend: {
					display: "bottom",
					padding: 10,
					spacing: 5
				}
			}
		});

		return Chart;
	}

	var $D = YAHOO.util.Dom;
	var $E = YAHOO.util.Event;

	$E.onDOMReady(function(e) {
		$E.addListener("time_chart_select", "change", function(e) {
			$D.get("id_user").value = this.value;
			$D.get("time_chart_form").submit();
		});
	});
</script>
<div>
	<?php
		echo Form::getDropdown(Lang::t('_USER', 'course_charts'), 'time_chart_select', 'time_chart_select', $users_list, $selected_user);
		echo Form::openForm('time_chart_form', $form_url);
		echo Form::getHidden('id_user', 'id_user', $selected_user);
		echo Form::closeForm();
	?>
</div>
