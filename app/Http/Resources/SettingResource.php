<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "attributes" => [
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
                "notification settings text" => $this->notification_settings_text,
                "about app" => $this->about_app,
                "who we are" => $this->who_we_are,
                "phone" => $this->phone,
                "email" => $this->email,
                "facebook" => $this->fd_link,
                "instagram" => $this->insta_link,
                "twitter" => $this->tw_link,
                "wattsApp" => $this->wta_link,
                "youtube" => $this->yt_link,
                "fax" => $this->fax,
                "app store link" => $this->app_store_link,
                "play store link" => $this->play_store_link,
            ],
             
        ];
    }
}
