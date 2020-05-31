<?php

namespace App\Observers;

use App\Product;
use App\Transactions;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        Transactions::create([
            'user_id' => 1,
            'type' => 'insert',
            'record' => $product->toJson()
        ]);
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        Transactions::create([
            'user_id' => 1,
            'type' => 'update',
            'record' => $product->toJson()
        ]);
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        Transactions::create([
            'user_id' => 1,
            'type' => 'delete',
            'record' => $product->toJson()
        ]);
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
