<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoriaDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     */
    public function render()
    {
        return view('components.categoria-dropdown', [
            'categories' => Category::all(),
            'categoriaActual' => Category::firstWhere('slug',request('categoria'))
            ]);
    }
}
