<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <h2 class="text-2xl font-semibold mb-6">All Payments</h2>

       

        <form method="GET" class="mb-6">

            <div class="flex flex-wrap items-center gap-4">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search payments..."
                       class="input input-bordered w-full max-w-sm" />

                <select name="payment_type" class="select select-bordered">
                    <option value="">All Payment Types</option>
                    <option value="online" {{ request('payment_type') == 'online' ? 'selected' : '' }}>Online</option>
                    <option value="bank" {{ request('payment_type') == 'bank' ? 'selected' : '' }}>Bank</option>
                </select>

                <select name="status" class="select select-bordered">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Completed</option>
                    <option value="declined" {{ request('status') == 'declined' ? 'selected' : '' }}>Failed</option>
                </select>

                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">Reset</a>
            </div>

            <!--<div class="flex flex-wrap items-center gap-4">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search payments..."
                       class="input input-bordered w-full max-w-sm" />

                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">Reset</a>
            </div>-->
        </form>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="table w-full">
                <thead>
                    <tr>
                        @foreach ([
                            //'id' => 'ID',
                            //'payable_type' => 'Parent',
                            'user_id' => 'User',
                            'user_id2' => 'School',
                            'payment_type' => 'Type',
                            'amount' => 'Amount',
                            'status' => 'Status',
                            'reference' => 'Reference',
                            'created_at' => 'Created',
                        ] as $field => $label)
                            <th class="px-4 py-2 text-left">
                                <a href="{{ route('admin.payments.index', array_merge(request()->all(), ['sort' => $field, 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}">
                                    {{ $label }}
                                    @if (request('sort') === $field)
                                        <span>
                                            {{ request('direction') === 'asc' ? '↑' : '↓' }}
                                        </span>
                                    @endif
                                </a>
                            </th>
                        @endforeach
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $p)
                        <tr class="border-t"><!--
                            <td class="text-center">{{ $p->id }}</td>
                            <td>{{ class_basename($p->payable_type) }} #{{ $p->payable_id }}</td>
                            <td class="text-center">{{ optional($p->payable)->user_id ?? '-' }}</td>-->
                            <td  >
                                <div class="line-clamp-1">{{$p->owner->name??'-'}}</div>


                            </td>

                            <td  >
                                
@php
$sn='';
try{

$x=$p->payable()->with('application')->first()->registration_id;
$p2=Modules\Registrations\Models\Registration::find($x);

//'payable.application'
$a=$p2->data??[];
$sn=$a['sectionA']['proposed_name']??'';
//dd($sn);
//application
}catch(\Exception $e){}
@endphp 

<!--
    {!!$p->payable->application!!}
    -->
 <div class="line-clamp-1">{{$sn}}</div> 
                            </td>

                            <td class="text-center">{{ $p->payment_type }}</td>
                            <td class="text-right">{{ number_format(data_get($p->meta, 'amount'),2) }}</td>
                            <td class="text-center">{{ $p->status }}</td>
                            <td class="text-center">{{ $p->reference??'Unavailable' }}</td>
                            <td class="text-center">{{ $p->created_at->format('Y-m-d H:i') }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.payments.show', $p->id) }}" class="text-blue-500 underline">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">No payments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

         <form method="GET" action="{{ route('admin.payments.index') }}" class="mb-6 mt-5 space-y-4">
    <div class="flex flex-wrap items-center gap-4">

        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Search payments..."
               class="input input-bordered w-full max-w-sm" />

        <select name="payment_type" class="select select-bordered">
            <option value="">All Payment Types</option>
            <option value="online" {{ request('payment_type') == 'online' ? 'selected' : '' }}>Online</option>
            <option value="bank" {{ request('payment_type') == 'bank' ? 'selected' : '' }}>Bank</option>
        </select>

        <select name="status" class="select select-bordered">
            <option value="">All Statuses</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
        </select>
        <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">Reset</a>

        <input type="date" name="from" value="{{ request('from') }}" class="input input-bordered" />
        <input type="date" name="to" value="{{ request('to') }}" class="input input-bordered" />

<!--
        <button type="submit" class="btn btn-primary">Filter</button>-->


        <a href="{{ route('admin.payments.export', request()->query()) }}"
           class="btn btn-success">
           Export CSV
        </a>
    </div>
</form>


        <div class="mt-4">
            {{ $payments->appends(request()->query())->links() }}
        </div>

    </div>
</x-app-layout>
