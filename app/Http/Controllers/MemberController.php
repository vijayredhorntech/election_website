<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Member;
use App\Http\Requests\MemberRequest;

class MemberController extends Controller
{
    public function index()
    {
        $formData = [
            'url' => route('member.store'),
            'method' => 'POST',
            'type' => 'Create',
        ];

        $Members = Member::all();

        return view('admin.members.index')->with('formData', $formData)->with('members', $Members);
    }


    public function store(MemberRequest $request)
    {
        // dd($request->all());
        $validatedData = $request->validated();
        $member = Member::create($validatedData);
        return redirect()->route('members.index')->with('success', 'Member created successfully');
    }

    public function edit($id)
    {
        $formData = [
            'url' => route('member.update', ['id' => $id]),
            'method' => 'POST',
            'type' => 'Update',
        ];

        $Members = Member::all();
        $member = Member::find($id);
        return view('admin.members.index')->with('member', $member)->with('formData', $formData)->with('members', $Members);
    }
    public function update(MemberRequest $request, $id)
    {
        $validatedData = $request->validated();
        $member = Member::find($id);
        $member->update($validatedData);
        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }

    public function delete($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }
}
