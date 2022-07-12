<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use Illuminate\Http\Request;
use App\Models\DetailPlan;
use App\Models\Plan;

class DetailPlanController extends Controller
{
    public function __construct(private DetailPlan $detailPlan, private Plan $plan)
    {
    }

    public function index($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details
        ]);
    }

    public function show($urlPlan, $detailId)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->detailPlan->find($detailId);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    public function create($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan
        ]);
    }

    public function edit($urlPlan, $detailId)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->detailPlan->find($detailId);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    public function update(StoreUpdateDetailPlan $request, $urlPlan, $detailId)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->detailPlan->find($detailId);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->update($request->all());

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    public function destroy($urlPlan, $detailId)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->detailPlan->find($detailId);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->delete();
        
        return redirect()
                    ->route('details.plan.index', $plan->url)
                    ->with('message', 'Registro deletado com sucesso!');
    }

    public function store(StoreUpdateDetailPlan $request, $urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $urlPlan);
    }
}
