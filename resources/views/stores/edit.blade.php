<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
					{{ $store->title }}
			</h2>
	</x-slot>

	<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
					<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
							<div class="max-w-xl">
								<section>
									<header>
											<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
													{{ __('Store Information') }}
											</h2>
							
											<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
													{{ __("Update your store's information.") }}
											</p>
									</header>
							
									<form id="send-verification" method="post" action="{{ route('verification.send') }}">
											@csrf
									</form>
							
									<form method="post" action="{{ route('stores.update', $store->id) }}" class="mt-6 space-y-6">
											@csrf
											@method('patch')
							
											<div>
													<x-input-label for="title" :value="__('Title')" />
													<x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $store->title)" required autofocus autocomplete="title" />
													<x-input-error class="mt-2" :messages="$errors->get('title')" />
											</div>

											<div>
												<x-input-label for="description" :value="__('Description')" />
												<x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $store->description)" required autofocus autocomplete="description" />
												<x-input-error class="mt-2" :messages="$errors->get('description')" />
											</div>

											<div>
												<x-input-label for="location" :value="__('Location')" />
												<x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location', $store->location)" required autofocus autocomplete="location" />
												<x-input-error class="mt-2" :messages="$errors->get('location')" />
											</div>
							
											
							
											<div class="flex items-center gap-4">
													<x-primary-button>{{ __('Save') }}</x-primary-button>
							
													@if (session('status') === 'store-updated')
															<p
																	x-data="{ show: true }"
																	x-show="show"
																	x-transition
																	x-init="setTimeout(() => show = false, 2000)"
																	class="text-sm text-gray-600 dark:text-gray-400"
															>{{ __('Saved.') }}</p>
													@endif
											</div>
									</form>
							</section>
							
							</div>
					</div>
			</div>
	</div>
</x-app-layout>
