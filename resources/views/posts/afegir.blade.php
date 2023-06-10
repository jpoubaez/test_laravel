
<x-layout>
	<section class="px-6 py-8">
		<x-panell class="max-w-sm mx-auto">
			<form method="POST" action="/admin/posts">
				@csrf

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
						Titol
					</label>
					<input class="border border/text-gray-400 p-2 w-full" 
						type="text" name="titol" id="titol" value="{{ old('titol') }}" required>
					@error('titol')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
						Slug
					</label>
					<input class="border border/text-gray-400 p-2 w-full" 
						type="text" name="slug" id="slug" value="{{ old('slug') }}" required>
					@error('slug')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
						Excerpt
					</label>
					<textarea class="border border-gray-400 p-2 w-full" 
						name="excerpt" id="excerpt" required>
						{{ old('excerpt') }}
					</textarea>

					@error('excerpt')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
						Body
					</label>
					<textarea class="border border-gray-400 p-2 w-full" 
						name="body" id="body" required>
						{{ old('body') }}
					</textarea>

					@error('body')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="categoria">
						Categoria
					</label>
					<select name="categoria_id" id="categoria_id">
						@php
							$categories = \App\Models\Category::all();
						@endphp
						@foreach ($categories as $categoria)
							<option 
									value="{{ $categoria->id }}" 
									{{ old('categoria_id') == $categoria->id ? 'selected' : '' }} 
							>{{ ucwords($categoria->nom) }}</option>
						@endforeach
					</select>

					@error('categoria_id')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>

				<x-submit-button>Publica</x-submit-button>

			</form>
		</x-panell>
	</section>
</x-layout>