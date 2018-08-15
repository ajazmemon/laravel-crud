@extends('layouts.app')
@section('content')
<div class="container">
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>
					Id
				</th>
				<th>
					Name
				</th>
				<th>
					Title
				</th>
				<th>
					Address
				</th>
				<th>
					Email
				</th>
				<th>
					Logo
				</th>
				<th>
					Getway
				</th>
				<th>
					Hobby
				</th>
				<th>
					Gender
				</th>
				<th>
					Action
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($blog as $b)
			<tr>
					<td><?=$b->id?></td>
					<td><?=$b->application_name?></td>
					<td><?=$b->title?></td>
					<td><?=$b->address?></td>
					<td><?=$b->email?></td>
					<td><img src= "{{asset('storage/app/img', $b->logo) }}" alt="Card image cap"></td>
					<td><?=$b->getway?></td>
					<td><?=$b->hobby?></td>
					<td><?=$b->gender?></td>
					<td><a href="{{route('edit',$b->id)}}"><span class="btn btn-primary">Edit  </span></a> | <a href="{{route('delete',$b->id)}}"><span class="btn btn-danger">Delete</span></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection