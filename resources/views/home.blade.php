@extends('app')

@section('content')


			<div class="hero is-primary is-bold is-fullheight">
				<div class="hero-body">
					<div class="column is-4 is-offset-4">
						<h1 class="title is-2">Summaryze</h1>
						<form class="form" method="POST" action="{{ route('summaryze') }}">
							{{ csrf_field() }}
							<div class="control has-addons">
								<input type="text" name="uri" class="input is-dark is-expanded is-large" placeholder="http://google.com" autocomplete="off" required>
								<button type="submit" class="button is-dark is-large">Search</button>
							</div>
							<span class="help">Enter a URI to get a summary of the page.</span>
						</form>
					</div>
				</div>
			</div>

@endsection