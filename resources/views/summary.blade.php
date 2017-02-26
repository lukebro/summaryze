@extends('app')

@section('content')
	
	<div class="section">
	<div class="container">
		<p class="control" style="margin-bottom: 5rem;"><a href="{{ route('home') }}" class="button is-primary is-outlined">Back</a></p>


		@if ($summary->title) 
			<h1 class="title is-2">{{ $summary->title }}</h1>
			<h2 class="subtitle"><a href="{{ $summary->uri }}">{{ $summary->uri }}</a></h2>
		@else
			<h1 class="title is-2"><a href="{{ $summary->uri }}">{{ $summary->uri }}</a></h1>
		@endif

		@if ($summary->description)
			<article class="message is-primary">
				<div class="message-header">Description</div>
				<div class="message-body">{{ $summary->description }}</div>
			</article>
		@endif

		@if ($summary->keywords)
			<h3 class="title is-3" style="margin-top: 5rem;">Keywords</h3>
			@foreach ($summary->keywords as $keyword)
				<span class="control tag is-medium is-{{ $summary->randomColor() }}">{{ $keyword }}</span>
			@endforeach
		@endif

		@if (false)
			<h3 class="title is-3" style="margin-top: 5rem;">Excerpts</h3>
			<div class="columns is-multiline">
			@foreach(collect($summary->excerpts)->unique()->values()->all() as $excerpt)
			<div class="column is-one-third">
			<div class="card">
				<div class="card-content">
					{{ $excerpt }}
				</div>
			</div>
			</div>
			@endforeach
			</div>
		@endif

		@if ($summary->excerpts)
			@php
				$excerpts = collect($summary->excerpts)->unique()->split(3);
			@endphp
			<h3 class="title is-3" style="margin-top: 5rem">Excerpts</h3>
			<div class="columns">
				@for ($i = 0; $i < 3; $i++)
				<div class="column is-one-third">
					@foreach ($excerpts[$i] as $excerpt)
						@if (trim($excerpt) != null)
							<div class="card" style="margin-bottom: 1.5rem;">
								<div class="card-content">
									{{ trim($excerpt) }}
								</div>
							</div>
						@endif
					@endforeach
				</div>
				@endfor
			</div>
		@endif


		@if ($summary->images)
			@php
				$images = collect($summary->images)->unique()->split(3);
			@endphp
			<h3 class="title is-3" style="margin-top: 5rem;">Images</h3>
			<div class="columns" >
				@for ($i = 0; $i < 3; $i++)
					<div class="column is-one-third">
						@foreach ($images[$i] as $image)
							<img src="{{ $image }}" class="image" style="width: 100%; margin-bottom: 1.5rem;">
						@endforeach
					</div>
				@endfor
			</div>
		@endif
	</div>
	</div>

@endsection