<div class="flex flex-col gap-1">
    <label for="title" class="font-semibold text-sm text-black">Title <span class="text-danger">*</span></label>
    <select name="title"
        class="text-sm px-4 py-1.5 rounded-[3px] border-[1px] border-primaryLight/50 placeholder-black text-black focus:outline-none focus:ring-0 focus:border-primaryLight/80 transition ease-in duration-2000">
        <option value="">Select title</option>
        <option value="MR." {{ (old('title', $data->title ?? '') == 'MR.') ? 'selected' : '' }}>MR.</option>
        <option value="MRS." {{ (old('title', $data->title ?? '') == 'MRS.') ? 'selected' : '' }}>MRS.</option>
        <option value="MISS" {{ (old('title', $data->title ?? '') == 'MISS') ? 'selected' : '' }}>MISS</option>
        <option value="DR." {{ (old('title', $data->title ?? '') == 'DR.') ? 'selected' : '' }}>DR.</option>
        <option value="MS." {{ (old('title', $data->title ?? '') == 'MS.') ? 'selected' : '' }}>MS.</option>
        <option value="PROF." {{ (old('title', $data->title ?? '') == 'PROF.') ? 'selected' : '' }}>PROF.</option>
        <option value="OTHER" {{ (old('title', $data->title ?? '') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
    </select>
</div>