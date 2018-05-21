<tr class="row table-light text-center band_reports_line" style="border-width: 3px !important;">
	<td class="col-4">{{ $report->band_name }}<span class="d-none" id="id">{{ $report->band_id}}</span></td>
	<td class="col-4"><a class="text-primary" href="band_reports/?id={{ $report->band_id }}">Link to reported content</a></td>
	@if($report->number_of_warnings == 0)
	<td class="col-2">0</td>
	@else
	<td class="col-2">{{ $report->number_of_warnings }}</td>
	@endif
	<td class="col-2">{{ $report->number_of_reports }}</td>
</tr>