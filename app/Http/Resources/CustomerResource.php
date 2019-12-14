<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    return [
      'id'             => $this->id,
      'user_id'        => $this->user_id,
      'fname'          => $this->fname,
      'mname'          => $this->mname,
      'lname'          => $this->lname,
      'phone_num'      => $this->phone_num,
      'account_status' => $this->account_status,
      'email'          => $this->user->email,
      'account_type'   => $this->user->account_type,
      'created_at'     => $this->created_at,
      'updated_at'     => $this->updated_at
    ];
  }
}
