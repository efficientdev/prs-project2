<x-app-layout>
 
<div class="max-w-3xl mx-auto mt-10" x-data="{ user_id: '', lga_id: '' }">

    <h1 class="text-2xl font-bold mb-6">Assign LGA to CIE User</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.assign-lga.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold mb-2">Select CIE User:</label>
            <select name="user_id" x-model="user_id" class="border rounded w-full p-2">
                <option value="">-- Select User --</option>
                @foreach($cieUsers as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold mb-2">Select LGA:</label>
            <select name="lga_id" x-model="lga_id" class="border rounded w-full p-2">
                <option value="">-- Select LGA --</option>
                @foreach($lgas as $lga)
                    <option value="{{ $lga->lga_id }}">{{ $lga->lga_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Assign LGA
            </button>
        </div>
    </form>

    <h2 class="text-xl font-semibold mt-10 mb-3">Existing Assignments</h2>
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2 border">LGA</th>
                <th class="p-2 border">Assigned User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $assign)
                <tr>
                    <td class="border p-2">{{ $assign->lga->lga_name ?? 'Unknown' }}</td>
                    <td class="border p-2">{{ $assign->user->name ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> 

</x-app-layout>