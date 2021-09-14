<?php

namespace KatalinKS\CompanyPlaces\Models;

use App\Interfaces\Model\CompanyContact;
use App\Models\Common\Address;
use App\Models\Common\Description;
use App\Models\Common\MapLocation;
use App\Models\Common\MetaData;
use App\Models\Common\Panorama;
use App\Models\Common\WorkSchedule;
use App\Models\Dictionary\PlaceType;
use App\Scopes\Company\CompanyPlace\ConnectionLinksScope;
use App\Traits\Model\GetterMethods;
use App\Traits\Model\HasCompanyContact;
use Illuminate\Database\Eloquent\Model;
use KatalinKS\CompanyPlaces\Interfaces\Place;
use Spatie\Translatable\HasTranslations;

class CompanyPlace extends Model implements CompanyContact, Place
{
    use HasTranslations, GetterMethods, HasCompanyContact;

    public $timestamps = false;
    protected $translatable = ['name'];

    public static function create(array $data): self {
        $model = new self();
        $model->name = $data['name'];
        $model->alias = $data['alias'];
        $model->type_id = $data['type'];
        $model->save();

        return $model;
    }

    public function updateObject(array $data): self {
        $this->name = $data['name'];
        $this->alias = $data['alias'];
        $this->type_id = $data['type'];
        $this->save();

        return $this;
    }

    public function metadata() {
        return $this->morphMany(MetaData::class, 'metadata','model', 'model_id', 'id');
    }

    public function address() {
        return $this->morphOne(Address::class, 'metadata','model', 'model_id', 'id');
    }

    public function descriptions() {
        return $this->morphMany(Description::class, 'metadata','model', 'model_id', 'id');
    }

    public function type() {
        return $this->belongsTo(PlaceType::class);
    }

    public function map() {
        return $this->morphOne(MapLocation::class, 'map','model', 'model_id', 'id');
    }

    public function panorama() {
        return $this->morphOne(Panorama::class, 'panorama','model', 'model_id', 'id');
    }

    public function workchedule() {
        return $this->morphOne(WorkSchedule::class, 'workchedule','model', 'model_id', 'id');
    }

    protected static function booted()
    {
        self::addGlobalScope(new ConnectionLinksScope());
    }

    public function getId(): int
    {
        return $this->getOriginal('id');
    }
}
