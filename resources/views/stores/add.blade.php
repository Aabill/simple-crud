<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
					{{ __("New Store") }}
			</h2>
	</x-slot>

	<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
					<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
							<div class="max-w-xl">
								<section>
									<header>
											<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
													{{ __('Add Store') }}
											</h2>
							
											<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
													{{ __("Create a new store.") }}
											</p>
									</header>
							
									<form id="send-verification" method="post" action="{{ route('verification.send') }}">
											@csrf
									</form>
							
									<form method="post" action="{{ route('stores.create') }}" class="mt-6 space-y-6">
											@csrf
											<div>
													<x-input-label for="title" :value="__('Title')" />
													<x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', '')" required autofocus autocomplete="title" />
													<x-input-error class="mt-2" :messages="$errors->get('title')" />
											</div>

											<div>
												<x-input-label for="description" :value="__('Description')" />
												<x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', '')" required autofocus autocomplete="description" />
												<x-input-error class="mt-2" :messages="$errors->get('description')" />
											</div>

											<div>
												<x-input-label for="location" :value="__('Location')" />
												<x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location', '')" required autofocus autocomplete="location" />
												<x-input-error class="mt-2" :messages="$errors->get('location')" />
											</div>
							
											
							
											<div class="flex items-center gap-4">
													<x-primary-button>{{ __('Save') }}</x-primary-button>
							
													@if (session('status') === 'store-created')
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
