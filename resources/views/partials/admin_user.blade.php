<tr class="row table-light text-center user_line">
	<td class="col-3 username">{{ $user->username }} <span class="d-none id">{{ $user->id }}</span></td>
	<td class="col-6">{{ $user->name }}</td>
	<td class="col-3">
		<label class="switch">
			@if($user->admin)
				<input type="checkbox" class="toggleInput" checked>
				<span class="slider round"></span>
			@else
				<input type="checkbox" class="toggleInput">
				<span class="slider round"></span>
			@endif
		</label>
	</td>
</tr>