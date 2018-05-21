<tr class="row table-light text-center banned_user_line">
	<td class="d-none ban_id">{{ $ban->id }}</td>
	<td class="col-2 p-2 username">{{ $ban->username }} <span class="d-none user_id">{{ $ban->userid }}</span></td>
	<td class="col-2 p-2">{{ $ban->name }}</td>
	<td class="col-3 p-2">{{ $ban->reason }}</td>
	<td class="col-2 p-2">{{ date("d-m-Y - H:i", strtotime($ban->bandate)) }}</td>
	<td class="col-2 p-2">
		@if($ban->ceasedate == null)
			{{ "Undefined"}}
		@else
			{{ date("d-m-Y - H:i", strtotime($ban->ceasedate)) }}</td>
		@endif
	<td class="col-1 p-2">
		<span id="lift_ban_button" title="Lift ban">
			<i class="fas fa-thumbs-up "></i>
		</span>
	</td>
</tr>