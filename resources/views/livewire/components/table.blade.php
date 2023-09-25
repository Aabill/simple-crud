<div>
	<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
		<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
				<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
						<tr>
								<th>
									@if (count($trash) > 0)
									<div class="text-gray-600 dark:text-gray-300 flex" >
										<button wire:click="deleteTrash" class="shadow-sm rounded dark:border-gray-500 p-1 border flex mx-auto hover:bg-red-500 hover:border-gray-300 transition-all ease-linear duration-100 group relative">
											<x-heroicon-o-trash class="h-5 w-5 inline-block transform group-hover:-translate-y-[1px] transition-all ease-linear duration-100"/>
												<span class="absolute rounded-full px-1.5 text-[12px] bg-red-500 -top-1 -right-2 font-bold border border-gray-300">{{ count($trash) }}</span>
										</button>
									</div>
									@else
									<x-heroicon-o-trash class="w-5 h-5 block mx-auto"></x-heroicon-o-trash>
									@endif

								</th>
								<th scope="col" class="px-6 py-3">
									{{ __("Title") }}
								</th>
								<th scope="col" class="px-6 py-3">
									{{ __("Description") }}
								</th>
								<th scope="col" class="px-6 py-3">
									{{ __("Location") }}
								</th>
								<th scope="col" class="px-6 py-3">
									<span class="sr-only">{{ __("Edit") }}</span>
								</th>
						</tr>
				</thead>
				<tbody>
					@foreach ($items as $key => $item)
						<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
								<td class="px-6 py-4">
									<x-text-input type="checkbox" wire:click="toggleCheck({{ $item->id }}, {{ $key }})" class="m-1" ></x-text-input>
								</td>	
								<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
										{{ $item->title }}
								</th>
								<td class="px-6 py-4 whitespace-nowrap">
										{{ $item->description }}
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
										{{ $item->location }}
								</td>
								<td class="px-6 py-4 text-right">
										<a href="{{ route('stores.edit', $item->id) }}" class="font-medium hover:bg-blue-600 dark:text-blue-500">
											<x-secondary-button><x-heroicon-o-pencil-square class="w-5 h-5"/></x-secondary-button>
										</a>
								</td>
						</tr>
					@endforeach
				</tbody>
		</table>
	</div>

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
