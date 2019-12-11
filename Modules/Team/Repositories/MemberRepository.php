<?php

namespace Modules\Team\Repositories;

use Modules\Team\Entities\Member;
use App\Repositories\Eloquent\BaseRepository;

class MemberRepository extends BaseRepository 
{
  
    /**
     * MemberRepository constructor.
     *
     * @param Member $member
     */
    public function __construct(Member $member)
    {
        $this->model = $member;
    }

}
