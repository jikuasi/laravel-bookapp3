@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-warning">
				<div class="panel-heading">
					新しい本を読んだのならば！
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors ここでエラーを呼び出してる -->
					@include('common.errors')

					<!-- New Book Form -->
					<form action="/book" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Book Name -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">タイトル書こか</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="book-name" class="form-control" value="{{ old('book') }}">
							</div>
						</div>

						<!-- Add Book Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-plus"></i>リストに追加や！
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Books -->
			@if (count($books) > 0)
				<div class="panel panel-info">
					<div class="panel-heading">
						読んだ本の一覧
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>書籍タイトル</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($books as $book)
									<tr>
										<td class="table-text"><div>{{ $book->title }}</div></td>

										<!-- Task Delete Button -->
										<td>
											<form action="/book/{{ $book->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" class="btn btn-danger">
													<i class="fa fa-fire"></i>焼却処分
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection