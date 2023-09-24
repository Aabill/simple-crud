<div>

    {{-- The whole world belongs to you. --}}
		<table class="table-auto w-full m-2 text-gray-600 dark:text-gray-300">
			<thead>
				<tr>
					<th>
						{{-- <x-text-input class="m-1" type="checkbox"
							wire:click="checkAll('{{ $items->map(fn($i) => $i->id)->implode(',') }}')">
						</x-text-input> --}}
					</th>
					<th>{{ __("Title") }}</th>
					<th>{{ __("Description") }}</th>
					<th>{{ __("Location") }}</th>
					<th>{{ __("Edit") }}</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($items as $key => $item)
					<tr>
						<td>
							<x-text-input type="checkbox" wire:click="toggleCheck({{ $item->id }}, {{ $key }})" class="m-1" ></x-text-input>
						</td>
						<td class="p-1">{{ $item->title }}</td>
						<td class="p-1">{{ $str::limit($item->description, 50) }}</td>
						<td>{{ $item->location }}</td>
						<td>
							<a href="{{ route('stores.edit', $item->id) }}">
								<x-secondary-button><x-heroicon-o-pencil-square class="w-5 h-5"/></x-secondary-button>
							</a>
							</td>
					</tr>
				@endforeach

			</tbody>

		</table>
		{{-- Trash Icon --}}
		@if (count($trash) > 0)
		<div class="text-gray-600 dark:text-gray-300 flex mb-2" >
			<button wire:click="deleteTrash" class="shadow-sm rounded border-red-500 p-2 border flex hover:bg-red-500 hover:border-gray-300 transition-all ease-linear duration-100 group relative">
				<x-heroicon-o-trash class="h-5 w-5 inline-block transform group-hover:-translate-y-[1px] transition-all ease-linear duration-100"/>
					<span class="absolute rounded-full px-1.5 text-[12px] bg-red-500 -top-2 -right-2 font-bold border border-gray-300">{{ count($trash) }}</span>
			</button>
		</div>
		@endif
		
		{{ $items->onEachSide(1)->links('vendor.pagination.tailwind') }}

		{{-- {{  var_export($items->map(fn($i) => $i->id)->implode(',')) }}

		<div>
			{{  var_export($checkbox) }}

		</div>
		<div>
			{{  var_export($checkedTrash) }}

		</div> --}}

	{{-- <div>
		<h1>Grouped Checkbox</h1>
		<input type="checkbox" wire:model='checkered' value="yords"/>
		<input type="checkbox" wire:model='checkered' value="awew"/>
		<input type="checkbox" wire:model='checkered' value="wewwew"/>

		<h2>{{ var_export($checkered) }}</h2>
	</div> --}}

</div>
