<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

/**
 * Class Licenses
 * @package App\Models
 */
class Licenses extends Model
{
    use HasFactory;

    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = "mysql";
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "licenses";
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public static function getAllLicenses(): Collection
    {
        $result = DB::table("licenses")
            ->select(["organization", "ogrn", "inn", "license_number", "date_issue"])
            ->orderByDesc("date_issue")
            ->get();

        return self::parseCollection($result);
    }

    /**
     * @param int $licenseNumber
     * @return Collection
     */
    public function getLicenseInformation(int $licenseNumber): Collection
    {
        $result = DB::table($this->getTable())
            ->where("license_number", "LIKE", $licenseNumber . "_")
            ->get();
        return self::parseCollection($result);
    }

    /**
     * @param array $params
     * @return Collection
     */
    public static function searchLicenses(array $params): Collection
    {
        $query = [];

        foreach ($params as $k => $v) {
            if ($k === "_token") {
                continue;
            }
            if ($v !== null) {
                $query[] = [$k, "LIKE", "%" . $v . "%"];
            }
        }
        $result = DB::table("licenses")
            ->select(["organization", "ogrn", "inn", "license_number", "date_issue"])
            ->where($query)
            ->orderByDesc("date_issue")
            ->get();

        return self::parseCollection($result);
    }

    /**
     * @return mixed
     */
    public static function getCountLicenses(): mixed
    {
        return Cache::remember(
            "countLicenses",
            now()->addHours(1),
            function () {
                return DB::table("licenses")
                    ->count("id");
            }
        );
    }

    /**
     * @param Collection $collection
     * @return Collection
     */
    private static function parseCollection(Collection $collection): Collection
    {
        foreach ($collection as $key => $item) {
            $item->date_issue = date("d.m.Y", strtotime($item->date_issue));
            if (property_exists($item, "date_order")) {
                $item->date_order = date("d.m.Y", strtotime($item->date_order));
            }
            $collection[$key] = $item;
        }
        return $collection;
    }
}
