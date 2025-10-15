<x-app-layout>


<form method="post" action="{{route('prss.store')}}">
	@csrf
	<input type="hidden" name="id" value="{{$registration->id}}" />

	@php
	$sectionA=$pdata['sectionA']??[];
	@endphp

	<div>
    <label class="block text-sm font-medium text-gray-700">NAME OF SCHOOL</label>
    <input
        type="text"
        name="name_of_school"
        value="{{ old('name_of_school', $sectionA['proposed_name'] ?? '') }}"
        readonly
        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm"
    />
</div>

<div>
    <label class="block text-sm font-medium text-gray-700">TYPE OF SCHOOL</label>
    <input
        type="text"
        name="type_of_school"
        value="{{ old('type_of_school', $pdata['category'] ?? '') }}"
        readonly
        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm"
    />
</div>

<div>
    <label class="block text-sm font-medium text-gray-700">LOCATION OF SCHOOL</label>
    <input
        type="text"
        name="location_of_school"
        value="{{ old('location_of_school', $sectionA['school_address'] ?? '') }}"
        readonly
        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm"
    />
</div>


    @include('prss::formparts.1')
    @include('prss::formparts.2')
    @include('prss::formparts.3')
    @include('prss::formparts.4')
    @include('prss::formparts.5')
    @include('prss::formparts.6')
    @include('prss::formparts.7')
</form>


    <form method="POST" action="{{ route('srapprovals.reject', $approval) }}" class="mt-2">
        @csrf
        <div class="mb-3">
            <label>Comments (required for rejection)</label>
            <textarea name="comments" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-danger">Reject</button>
    </form>

 </x-app-layout>