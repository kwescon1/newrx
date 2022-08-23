<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
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
            'name' => $this['student']->name,
            'dob' => $this['student']->dob,
            'gender' => $this['student']->gender,
            'email' => $this['student']->email,
            'school_id' => $this['student']->school_id,
            'hostel_id' => $this['student']->hostel_id,
            'username' => $this['student']->username,
            'token' => $this['token']
        ];
    }
}
