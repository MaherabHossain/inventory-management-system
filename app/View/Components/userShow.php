<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Http\Controllers\saleInvoiceController;
class userShow extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.user-show');
    }
}
