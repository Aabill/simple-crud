<div>
	<div x-data="{showClearTrash: false}" class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
		<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
				<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
						<tr>
								<th>
									@if (count($trash) > 0)
									<div class="text-gray-600 dark:text-gray-300 flex relative" >
										<button wire:click.self="deleteTrash" class="shadow-sm rounded dark:border-gray-500 p-1 border flex mx-auto hover:bg-red-500 hover:border-gray-300 transition-all ease-linear duration-100 group ">
											<x-heroicon-o-trash class="h-5 w-5 inline-block transform group-hover:-translate-y-[1px] transition-all ease-linear duration-100"/>
										</button>
										<span v-show="!showClearTrash" class="absolute rounded-full px-1.5 text-[12px] bg-red-500 -top-1 right-2 font-bold border border-gray-300" x-on:mouseenter.debounce.200ms="showClearTrash = true">
											{{ count($trash) }}
										</span>
										<span x-show="showClearTrash" x-on:click="
											const checkedboxes = document.querySelectorAll('input[type=checkbox][custom-bind-check=checked]');
											checkedboxes.forEach(box => box.click());
										" class="absolute rounded-full px-1.5 text-[12px] bg-red-500 -top-1 right-2 font-bold border border-gray-300 cursor-pointer" x-on:mouseleave.debounce.200ms="showClearTrash = false"
										x-on:click.outside.debounce.200ms="showClearTrash = false">
											<x-heroicon-o-x-mark class="w-4 h-5 dark:text-gray-300"/>
										</span>
										
									</div>
									@else
									<x-heroicon-o-trash class="w-5 h-5 block mx-auto" 
									x-on:click="
										const checkboxes = document.querySelectorAll('input[type=checkbox]');
										checkboxes.forEach((box) => {
											box.click();
										});
									"></x-heroicon-o-trash>
									@endif

								</th>
								<th scope="col" class="px-6 py-3 text-center">
									{{ __("Edit") }}
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
								
						</tr>
				</thead>
				<tbody>
					@foreach ($items as $key => $item)
						<tr x-on:click="
							if ($event.target.type=='checkbox') return;
							$el.querySelector('input[type=checkbox]').click();"
							class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
								<td class="px-6 py-4">
									<x-text-input type="checkbox" wire:click="toggleCheck({{ $item->id }}, {{ $key }})" class="m-1" custom-bind-check="{{ isset($checkbox[$key]) && $checkbox[$key] ? 'checked' : 'nope' }}"></x-text-input>
								</td>	
								<td class="px-6 py-4 text-right">
									<a href="{{ route('stores.edit', $item->id) }}" class="font-medium hover:bg-blue-600 dark:text-blue-500">
										<x-secondary-button><x-heroicon-o-pencil-square class="w-5 h-5"/></x-secondary-button>
									</a>
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

	{{-- <div x-data x-init="console.log($wire.checkered)">
		<h1>Grouped Checkbox</h1>
		<input type="checkbox" wire:model='checkered' value="yords"/>
		<input type="checkbox" wire:model='checkered' value="awew"/>
		<input type="checkbox" wire:model='checkered' value="wewwew"/>

		<h2>{{ var_export($checkered) }}</h2>
	</div> --}}

</div>
