<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
				<span class="block">{{ __('Stores') }}</span>
				<a href="{{ route('stores.add') }}">
					<x-primary-button>
						<x-heroicon-o-plus-circle class="w-5 h-5 mr-1"></x-heroicon-o-plus-circle>
						<span class="block">{{ __('Add') }}</span>
					</x-primary-button>
				</a>
				
			</h2>
			
	</x-slot>

	<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				@if (session('status') === 'store-created')
					<div 
					x-data="{ show: true }"
					x-show="show"
					x-transition
					x-init="setTimeout(() => show = false, 2000)"
					 class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-2">
						<div class="flex items-center gap-4 p-4">
									<p class="text-sm text-green-600 dark:text-green-400">
										{{ __('New Store Created.') }}
									</p>
						</div>
					</div>
				@endif
					<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
							
							<div class="p-6 text-gray-900 dark:text-gray-100">
									<livewire:components.table :user="$user" :model="'stores'">
							</div>
							
					</div>
			</div>
	</div>
</x-app-layout>
