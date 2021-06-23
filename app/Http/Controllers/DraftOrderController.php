<?php

namespace App\Http\Controllers;

use App\Actions\Order\CreateNewDraftOrder;
use App\Http\Requests\HomepageDraftOrderRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class DraftOrderController
{
    public function store(HomepageDraftOrderRequest $request): RedirectResponse
    {
        abort_if($this->isWriter(),Response::HTTP_UNAUTHORIZED,'Writers not allowed to create orders');

        if (auth()->guest()) {
            Session::put('draft-order', $request->validated());
            dd('not logged in');
        }

        return $this->saveDraftOrderAndRedirect($request);
    }

    public function edit(Order $order): \Inertia\Response
    {
        return Inertia::render('Student/Order/Draft',compact('order'));
    }

    private function saveDraftOrderAndRedirect(HomepageDraftOrderRequest $request): RedirectResponse
    {
        $order = CreateNewDraftOrder::create($request->user(), $request->validated());

        return redirect()->route('student.order.from-draft', $order);
    }

    private function isWriter(): bool
    {
        return auth()->check() && auth()->user()->isWriter();
    }
}
