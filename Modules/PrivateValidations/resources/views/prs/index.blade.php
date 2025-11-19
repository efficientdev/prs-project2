<x-app-layout>

<div class="bg-gray-50">
    <div class="container mx-auto   ">
        <div class="mb-10  ">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Your Private Validations</h1>
            <p class="text-gray-600">Review and manage your validation requests</p>
        </div>
        
 
<div 
    x-data="{
        filters: {
            school_name: '{{ $filters['school_name'] ?? '' }}',
            lga_id: '{{ $filters['lga_id'] ?? '' }}',
            ward_id: '{{ $filters['ward_id'] ?? '' }}',
            school_level: '{{ $filters['school_level'] ?? '' }}',
            school_category: '{{ $filters['school_category'] ?? '' }}',
        }
    }"
    class="p-6"
>

    <form method="GET" action="{{ route('prvschvalidlist.index') }}" class="space-y-4 mb-6">

        <!-- Row 1: Name Search -->
        <div>
            <label class="block font-semibold">School Name</label>
            <input type="text" name="school_name" x-model="filters.school_name"
                   class="border p-2 rounded w-1/3"
                   placeholder="Search by school name...">
        </div>
 
        <div class="grid grid-cols-2 gap-4 w-2/3">
	        <!-- Row 2: LGA Dropdown -->
	        <div>
	            <label class="block font-semibold">Local Government</label>
	            <select name="lga_id" x-model="filters.lga_id"
	                    class="border p-2 rounded w-1/3">
	                <option value="">-- All LGAs --</option>
	                @foreach ($lgas as $lga)
	                    <option value="{{ $lga->lga_id }}">
	                        {{ $lga->lga_name }}
	                    </option>
	                @endforeach
	            </select>
	        </div>

	        <!-- Row 3: Ward filtered by LGA -->
	        <div>
	            <label class="block font-semibold">Ward</label>
	            <select name="ward_id" x-model="filters.ward_id"
	                    class="border p-2 rounded w-1/3">
	                <option value="">-- All Wards --</option>

	                @foreach ($wards as $ward)
	                    <template x-if="filters.lga_id == '{{ $ward->lga_id }}'">
	                        <option value="{{ $ward->ward_id }}">
	                            {{ $ward->ward_name }}
	                        </option>
	                    </template>
	                @endforeach
	            </select>
	        </div>
	    </div>

        <!-- Row 4: Level + Category -->
        <div class="grid grid-cols-2 gap-4 w-2/3">
            <div>
                <label class="block font-semibold">School Level</label>
                <select name="school_level" x-model="filters.school_level"
                        class="border p-2 rounded w-full">
                    <option value="">-- All --</option>
                    @foreach(['Nursery','Primary','Basic','Junior Secondary','Senior Secondary'] as $level)
		                <option value="{{ $level }}" >{{ $level }}</option>
		            @endforeach 
                </select>
            </div>

            <div>
                <label class="block font-semibold">School Category</label>
                <select name="school_category" x-model="filters.school_category"
                        class="border p-2 rounded w-full">
                    <option value="">-- All --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
        </div>

        <!-- Submit -->
        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">Filter</button>
    </form>

    <!-- Schools Table -->
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">School Name</th>
                <th class="p-2 border">LGA</th>
                <th class="p-2 border">Ward</th>
                <th class="p-2 border">Level</th>
                <th class="p-2 border">Category</th>
                <th class="p-2 border">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($forms as $school)
                @php $a = $school->data['sectionA']; @endphp

                <tr>
                    <td class="p-2 border">{{ $a['school_name']??'n/a' }}</td>
                    <td class="p-2 border">{{ $a['lga']??'n/a' }}</td>
                    <td class="p-2 border">{{ $a['ward']??'n/a' }}</td>
                    <td class="p-2 border">{{ $a['school_level']??'n/a' }}</td>
                    <td class="p-2 border">{{ $a['school_category']??'n/a' }}</td>

                    <td class="p-2 border">
                        <a href="{{ route('private.validation.preview', $school->id) }}"
                           class="text-blue-600 underline">Show</a>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="p-3 text-center border">No Validations found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">{{ $forms->links() }}</div>

</div>

</div>
</div></x-app-layout>
