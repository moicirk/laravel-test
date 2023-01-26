<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TestsController extends Controller
{
    public function index(): View
    {
        $tests = Test::where('user_id', Auth::id())
            ->orderBy('id', 'asc')
            ->get();

        return view('tests.index', [
            'tests' => $tests
        ]);
    }

    public function create(): View
    {
        return view('tests.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validateTest($request);

        $test = new Test();
        $test->user_id = $request->get('user_id');
        $test->name = $request->get('name');
        $test->save();

        return $this->redirectHome('Test saved.');
    }

    public function edit(int $id): View
    {
        $test = Test::find($id);
        if (!$test) {
            throw new ModelNotFoundException();
        }

        return view('tests.edit', [
            'test' => $test
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $this->validateTest($request);

        $test = Test::find($id);
        $test->name = $request->get('name');
        $test->save();

        return $this->redirectHome('Test saved.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $test = Test::find($id);
        $test?->delete();

        return $this->redirectHome('Test deleted.');
    }

    private function validateTest(Request $request): void
    {
        $request->validate([
            'user_id' => ['required'],
            'name' => ['required', 'min:10']
        ]);
    }

    private function redirectHome(string $message): RedirectResponse
    {
        return redirect('/tests')->with('success', $message);
    }
}
