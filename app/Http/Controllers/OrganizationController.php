<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Activity;
use App\Http\Resources\OrganizationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::all();
        return OrganizationResource::collection($organizations);
    }

    public function getByBuildingId(string $id)
    {
        $organizations = Organization::where('building_id', $id)->get();
        return OrganizationResource::collection($organizations);
    }

    public function getById(string $id)
    {
        $organization = Organization::find($id);
        if (empty($organization)) {
            return response()->json(['msg' => 'Организация id=[{$id}] не найдена']);
        } else {
            return new OrganizationResource($organization);
        }
    }

    public function getByActivityId(string $id)
    {
        $activity = Activity::find($id);
        if (empty($activity)) {
            return response()->json(['msg' => 'Вид деятельности id=[{$id}] не найден']);
        } else {
            $organizationsIds = DB::table('organization_activity')->where('activity_id', $id)->select('organization_id')->get()->toArray();
            $ids = array_map(fn($item) => $item->organization_id, $organizationsIds);
            $organizations = Organization::whereIn('id', $ids)->get();

            return OrganizationResource::collection($organizations);
        }
    }

    public function getByActivityIds(string $id)
    {
        $activity = Activity::find($id);
        if (empty($activity)) {
            return response()->json(['msg' => 'Вид деятельности id=[{$id}] не найден']);
        } else {
            $childrenActivities = Activity::where('parent_id', $id)->select('id')->get()->toArray();
            $childrenIds = array_map(fn($item) => $item['id'], $childrenActivities);

            $children = Activity::whereIn('parent_id', $childrenIds)->select('id')->get()->toArray();

            $child = array_map(fn($item) => $item['id'], $children);
            $result = array_merge($childrenIds, $child);
            $result[] = (int)$id;

            $organizationsIds = DB::table('organization_activity')->whereIn('activity_id', $result)->select('organization_id')->get()->toArray();
            $ids = array_map(fn($item) => $item->organization_id, $organizationsIds);
            $organizations = Organization::whereIn('id', $ids)->get();

            return OrganizationResource::collection($organizations);
        }
    }

    public function getByName(Request $request)
    {
        $name = $request->input('name');

        if (!empty($name)) {
            $organizations = Organization::where('name', 'like', '%' . $name . '%')->get();

            return OrganizationResource::collection($organizations);
        } else {
            return OrganizationResource::collection(Organization::all());
        }
    }
}
