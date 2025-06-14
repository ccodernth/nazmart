<?php

namespace Modules\MobileApp\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public static $wrap = 'category';

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $sub_category = [];
        $image_url = null;
        
      
        if(!empty($this->subcategory)){
            $sub_category["sub_categories"] = SubCategoryResource::collection($this->subcategory);

            $image = get_attachment_image_by_id($this->image_id);
            $image_url = !empty($image) ? $image['img_url'] : null;
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $image_url,
        ] + $sub_category;
    }

    public function with($request): array
    {
         return [
             "success" => true,
         ];
    }
}
