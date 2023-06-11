<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class DeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        $this->tagsDetaching($product);
        $this->colorsDetaching($product);

        $product->category()->dissociate();
        $product->save();

        $product->groups()->dissociate();
        $product->save();

        $product->delete();

        return redirect()->route('product.index');
    }

    protected function tagsDetaching(Product $product)
    {
        $tagsIds = [];
        foreach ($product->tags as $tag) {
            array_push($tagsIds, $tag->id);
        }
        $product->tags()->detach($tagsIds);

        unset($tagsIds);
    }

    protected function colorsDetaching(Product $product)
    {
        $colorIds = [];
        foreach ($product->colors as $color) {
            array_push($colorIds, $color->id);
        }
        $product->colors()->detach($colorIds);

        unset($colorIds);
    }
}
