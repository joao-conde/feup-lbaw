<tr class="row table-light text-center user_reports_line" style="border-width: 3px !important;">
	<td class="d-none user_id">{{ $report->user_id }}</td>
	<td class="d-none report_id">{{ $report->reportid }}</td>
	<td class="col-2">{{ date("d-m-Y - H:i", strtotime($report->date)) }}</td>
	<td class="col-2">{{ $report->text }}</td>
	<td class="col-6">{{ $report->contenttext }}</td>
	<td class="col-2">
		<span id="ignore_button" title="Ignore report">
			<i class="fas fa-check text-success"></i>
		</span>
		<span id="remove_button" title="Remove content">
			<i class="fas fa-times text-danger ml-1"></i>
		</span>
		<span id="warn_button" title="Warn user">
			<i class="fas fa-exclamation-triangle text-warning ml-1"></i>
		</span>
		<span id="ban_button" title="Ban user">
			<i class="fas fa-ban text-danger ml-1"></i>
		</span>
	</td>
</tr>