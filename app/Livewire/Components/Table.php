<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Client\Request;

class Table extends Component
{
	public User $user;
	public string $model;
	
	public $perpage = 5;
	public $checkbox = [];
	public $trash = [];

	use WithPagination;


	public function mount($user) {
		$this->user = $user;
	}
    public function render()
    {
        return view('livewire.components.table', [
					'items' => $this->user->{$this->model}()->where('delete', false)->paginate($this->perpage),
					'str' => new Str
				]);
    }

		public function toggleCheck($id, $key) {
			if (!isset($this->checkbox[$key])) {
				$this->checkbox[$key] = true;
				$this->trash[$id] = true;
			} else {
				$this->checkbox[$key] = !$this->checkbox[$key];
				if (isset($this->trash[$id]) && $this->trash[$id]) {
					unset($this->trash[$id]);
				} else {
					$this->trash[$id] = true;
				}
			}
			$this->trash = collect($this->trash)->filter(fn($t) => $t === true);
		}

		public function deleteTrash() {
			$ids = collect($this->trash)->keys();
			$this->user->stores()->whereIn('id', $ids)->update([
				'delete' => true
			]);
			$this->redirect(url()->previous());
		}

		public function checkAll($ids) {
			$ids = explode(',', $ids);
			// foreach(range(0, $this->perpage - 1) as $r) {
			// 	array_push($keys[$r])
			// }
			// // $this->checkbox = collect($this->checkbox)->;
			// // $this->trash = [];
			foreach ($ids as $key => $id) {
				$this->toggleCheck($id, $key);
			}
		}
}
