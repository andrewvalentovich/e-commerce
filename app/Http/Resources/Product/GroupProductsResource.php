<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $products = Product::where('group_id', $this->group_id)->get();

        return [
            'id' => $this->id,
            'number' => $this->number,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'preview_image_url' => $this->previewImageUrl, // Получаем путь к картинке, см. модель Product getPreviewImageUrlAttribute
            'hover_image_url' => $this->hoverImageUrl, // Получаем путь к картинке, см. модель Product getPreviewImageUrlAttribute
            'price' => $this->price,
            'count' => $this->count,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->category),
            'group_products' => ProductResource::collection($products),
        ];
    }
}