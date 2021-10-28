<?php

namespace App\Repository\Eloquent;

use App\Models\CheckIn;
use Illuminate\Support\Facades\DB;
use App\Repository\CheckInRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repository\Eloquent\Base\BaseRepository;

class CheckInRepository extends BaseRepository implements CheckInRepositoryInterface
{

    /**
     * Type of the resource to manage.
     *
     * @var string
     */
    protected $resourceType = CheckIn::class;

    public function all()
    {
        $request = request();
        $limit = 10;
        $result = DB::select($this->queryBuilder($request->all(), $limit));
        $paginator = new LengthAwarePaginator($result, $result[0]->total_count ?? 0, $limit);
        $paginator->setPath($request->url());

        return $paginator;
    }

    private function queryBuilder($params, $limit)
    {
        $fromDate = $params['from_date'] ?? null;
        $toDate = $params['to_date'] ?? null;
        $page = $params['page'] ?? 1;
        $offset = $limit * ($page - 1);
        $whereDate = $fromDate || $toDate ? "where
            ci.check_in_date between '{$fromDate}' and '{$toDate}'" : '';

        return "
            select
                ci.id,
                u.name,
                u.occupation,
                u.email,
                (YEAR(CURDATE())-YEAR(u.birthdate)) as age,
                manager.name as manager_name,
                ci.check_in_date,
                COUNT(*) OVER () as total_count
            from
                check_ins as ci
            join
                users as u on ci.user_id = u.id
            left join
                users as manager on manager.id = u.manager_id
            {$whereDate}
            order by ci.check_in_date desc
            limit {$limit} offset {$offset};
        ";
    }
}
