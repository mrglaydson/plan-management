<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct(private Plan $plan) {}

    public function index()
    {
        $plans = $this->plan->latest()->paginate(5);

        return view('admin.pages.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function show($url)
    {
        $plan = $this->plan->where('url', $url)->first();

        if (!$plan) {
           return redirect()->back();
        }

        return view('admin.pages.plans.show', ['plan' => $plan]);
    }

    public function edit($url)
    {
        $plan = $this->plan->where('url', $url)->first();

        return view('admin.pages.plans.edit', ['plan' => $plan]);
    }

    public function store(StoreUpdatePlanRequest $request)
    {
        $this->plan->create($request->all());

        return redirect()->route('plans.index');
    }

    public function update(StoreUpdatePlanRequest $request, $url)
    {
        $plan = $this->plan->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }

    public function destroy($url)
    {
        $plan = $this->plan
                        ->with('details')
                        ->where('url', $url)
                        ->first();

        if (!$plan) {
            return redirect()->back();
        }

        if ($plan->details->count() > 0) {
            return redirect()
                    ->back()
                    ->with('error', 'Existem Detalhes vinculados a esse plano, portanto, remova os detalhes antes de remover o plano');
        }
        

        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $plans = $this->plan->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }
}
