<tr class="row table-light text-center user_line">
	<td class="col-3 p-2 username">{{ $user->username }} <span class="d-none id">{{ $user->id }}</span></td>
	<td class="col-6 p-2">{{ $user->name }}</td>
	<td class="col-3 p-2">
		<label class="switch mt-1">
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