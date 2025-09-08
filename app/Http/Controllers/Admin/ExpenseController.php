<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::latest()->paginate(10);
        return view('admin.expenses.index', compact('expenses'));
    }

    public function create()
    {
        return view('admin.expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required',
            'amount' => 'required|numeric',
        ]);

        Expense::create($request->all());
        return redirect()->route('admin.expenses.index')->with('success', 'Pengeluaran ditambahkan');
    }

    public function edit(Expense $expense)
    {
        return view('admin.expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'title'  => 'required',
            'amount' => 'required|numeric',
        ]);

        $expense->update($request->all());
        return redirect()->route('admin.expenses.index')->with('success', 'Pengeluaran diperbarui');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('admin.expenses.index')->with('success', 'Pengeluaran dihapus');
    }
}
